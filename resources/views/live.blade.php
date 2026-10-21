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
    <title>Live Calculator | {{ env('APP_NAME') }} - {{ env('APP_TAG') }}</title>
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    @vite(['resources/css/live.css', 'resources/js/live.js'])
</head>
<body>
    <dialog id="modal" closedby="closerequest">
        <h2 id="modal_title"></h2>
        <p id="modal_message"></p>
        <button id="modal_close_button" class="nav-button">Close</button>
    </dialog>
    <nav>
        <a href="/">Back to Site</a>
        <a href="/live">Reset Game</a>
        <button class="nav-button" id="end_round">End Round</a>
    </nav>
    <div id="round_counter">Round 1</div>
    <div id="app">
        <div class="player-selection-wrapper">
            <button class="nav-button" id="two_players">Two Players</button>
            <button class="nav-button" id="three_players">Three Players</button>
            <button class="nav-button" id="four_players">Four Players</button>
        </div>
    </div>
</body>