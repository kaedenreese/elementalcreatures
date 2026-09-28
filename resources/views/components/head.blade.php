<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D8RG3GD13L"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D8RG3GD13L');
</script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="An easy-to-learn trading card game that pits decks of creatures against each other to boost their power to victory." />
    <title>{{ $title ?? config('app.name') . ' - The brand new elemental trading card game!' }}</title>
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    @vite(['resources/css/style.css'])
    @stack('css')
    @stack('js')
</head>