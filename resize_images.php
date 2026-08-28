<?php

function trimTransparentPixels(GdImage $image): GdImage
{
    $width = imagesx($image);
    $height = imagesy($image);

    $minX = $width;
    $minY = $height;
    $maxX = -1;
    $maxY = -1;

    // Find the bounding box of non-transparent pixels
    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {

            $rgba = imagecolorat($image, $x, $y);

            // Extract alpha channel (0 = opaque, 127 = fully transparent)
            $alpha = ($rgba >> 24) & 0x7F;

            if ($alpha < 127) {
                $minX = min($minX, $x);
                $minY = min($minY, $y);
                $maxX = max($maxX, $x);
                $maxY = max($maxY, $y);
            }
        }
    }

    // Image is completely transparent
    if ($maxX === -1) {
        return $image;
    }

    $trimmedWidth = $maxX - $minX + 1;
    $trimmedHeight = $maxY - $minY + 1;

    // Nothing to trim
    if (
        $minX === 0 &&
        $minY === 0 &&
        $trimmedWidth === $width &&
        $trimmedHeight === $height
    ) {
        return $image;
    }

    $trimmed = imagecreatetruecolor($trimmedWidth, $trimmedHeight);

    // Preserve transparency
    imagealphablending($trimmed, false);
    imagesavealpha($trimmed, true);

    $transparent = imagecolorallocatealpha(
        $trimmed,
        0,
        0,
        0,
        127
    );

    imagefill($trimmed, 0, 0, $transparent);

    imagecopy(
        $trimmed,
        $image,
        0,
        0,
        $minX,
        $minY,
        $trimmedWidth,
        $trimmedHeight
    );

    return $trimmed;
}


/**
 * Resize all images in a folder using PHP GD.
 */
function resizeImages(
    string $inputFolder,
    string $outputFolder,
    int $maxWidth,
    int $maxHeight
): void {
    if (!is_dir($inputFolder)) {
        throw new Exception("Input folder does not exist: $inputFolder");
    }

    if (!is_dir($outputFolder)) {
        mkdir($outputFolder, 0777, true);
    }

    $files = scandir($inputFolder);

    foreach ($files as $file) {

        if ($file === '.' || $file === '..') {
            continue;
        }

        $inputPath = $inputFolder . DIRECTORY_SEPARATOR . $file;

        if (!is_file($inputPath)) {
            continue;
        }

        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        $filename = substr($file, 0, 3) . '.' . $extension;

        if (!in_array($extension, [
            'jpg',
            'jpeg',
            'png',
            'gif',
            'webp'
        ])) {
            continue;
        }

        $imageInfo = getimagesize($inputPath);

        if ($imageInfo === false) {
            echo "Skipping invalid image: $file\n";
            continue;
        }

        [$originalWidth, $originalHeight] = $imageInfo;

        // Load source image
        switch ($extension) {

            case 'jpg':
            case 'jpeg':
                $source = imagecreatefromjpeg($inputPath);
                break;

            case 'png':
                $source = imagecreatefrompng($inputPath);
                break;

            case 'gif':
                $source = imagecreatefromgif($inputPath);
                break;

            case 'webp':
                $source = imagecreatefromwebp($inputPath);
                break;

            default:
                continue 2;
        }

        if (!$source) {
            echo "Could not load image: $file\n";
            continue;
        }

        /*
         * Trim transparent borders BEFORE resizing.
         *
         * JPEG doesn't support transparency, so there's
         * nothing to trim for JPEG images.
         */
        if (in_array($extension, ['png', 'gif', 'webp'])) {
            $source = trimTransparentPixels($source);

            $originalWidth = imagesx($source);
            $originalHeight = imagesy($source);
        }

        // Calculate scale while maintaining aspect ratio
        $scale = min(
            $maxWidth / $originalWidth,
            $maxHeight / $originalHeight
        );

        // Don't enlarge smaller images
        $scale = min($scale, 1);

        $newWidth = max(1, (int) round($originalWidth * $scale));
        $newHeight = max(1, (int) round($originalHeight * $scale));

        // Create resized image
        $destination = imagecreatetruecolor(
            $newWidth,
            $newHeight
        );

        // Preserve transparency
        if (in_array($extension, ['png', 'gif', 'webp'])) {

            imagealphablending($destination, false);
            imagesavealpha($destination, true);

            $transparent = imagecolorallocatealpha(
                $destination,
                0,
                0,
                0,
                127
            );

            imagefill(
                $destination,
                0,
                0,
                $transparent
            );
        }

        // Resize
        imagecopyresampled(
            $destination,
            $source,
            0,
            0,
            0,
            0,
            $newWidth,
            $newHeight,
            $originalWidth,
            $originalHeight
        );

        // Save
        $outputPath = $outputFolder . DIRECTORY_SEPARATOR . $filename;

        switch ($extension) {

            case 'jpg':
            case 'jpeg':
                imagejpeg(
                    $destination,
                    $outputPath,
                    90
                );
                break;

            case 'png':
                imagepng(
                    $destination,
                    $outputPath,
                    6
                );
                break;

            case 'gif':
                imagegif(
                    $destination,
                    $outputPath
                );
                break;

            case 'webp':
                imagewebp(
                    $destination,
                    $outputPath,
                    90
                );
                break;
        }

        echo "Processed: $file → {$newWidth}x{$newHeight}\n";
    }
}


// --------------------------------------------------
// Configuration
// --------------------------------------------------

$inputFolder = 'D:\www\ec3.0\temp';
$outputFolder = 'D:\www\ec3.0\temp2';

$maxWidth = 100;
$maxHeight = 140;


// Run
resizeImages(
    $inputFolder,
    $outputFolder,
    $maxWidth,
    $maxHeight
);

echo "Done!\n";