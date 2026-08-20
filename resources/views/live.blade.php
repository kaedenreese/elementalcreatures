@push('css')
    @vite(['resources/css/live.css'])
@endpush

@push('js')
    @vite(['resources/js/live.js'])
@endpush

@include('components.head')
<body>
    <dialog id="modal" closedby="closerequest">
        <div class="modal-content">
            <h2 id="modal-title"></h2>
            <p id="modal-message"></p>
            <input type="button" id="modal-close-button" class="back-to-site-button" value="Close">
            <input type="button" id="modal-new-game-button" class="back-to-site-button" value="New Game">
        </div>
    </dialog>
    <div class="back-to-site">
        <div><input type="button" class="back-to-site-button go-back" value="Back to Site"></div>
        <div><input type="button" class="back-to-site-button flip" value="Flip"></div>
    </div>
    <div class="game-wrapper">
        <div class="player-wrapper player-1">
            <div class="player-one-points">0 Points</div>
            <div class="player-1-name text-centered">Player One</div>
            <div class="player-1-power text-centered">Power: <input type="number" name="player-one-power" id="player-one-power"></div>
            <div class="score-alter"><button class="player-one-power-down">-</button><button class="player-one-power-up">+</button></div>
        </div>
        <div class="controls">
            <div class="round-title text-centered">Round</div>
            <div class="round-number text-centered">1</div>
            <div><input type="button" id="end-round" class="back-to-site-button" value="End Round"></div>
            <div><input type="button" id="reset" class="back-to-site-button" value="Reset"></div>
        </div>
        <div class="player-wrapper player-2">
            <div class="player-two-points">0 Points</div>
            <div class="player-2-name text-centered">Player Two</div>
            <div class="player-2-power text-centered">Power: <input type="number" name="player-two-power" id="player-two-power"></div>
            <div class="score-alter"><button class="player-two-power-down">-</button><button class="player-two-power-up">+</button></div>
        </div>
    </div>
</body>