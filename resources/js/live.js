const App = {
    Players: []
}

class Game {
    App;
    Round;

    constructor(App) {
        this.App = App;
        this.Round = 1;
    }

    endRound() {
        let highestScorePlayerIndex = -1;
        let secondHighestScorePlayerIndex = -1;

        for(let i = 0; i < this.App.Players.length; i++) {
            const player = this.App.Players[i];
            const highestScorePlayer = this.App.Players[highestScorePlayerIndex];
            const secondHighestScorePlayer = this.App.Players[secondHighestScorePlayerIndex];

            if(highestScorePlayerIndex == -1) {
                highestScorePlayerIndex = i;
                continue;
            }

            if(player.getRoundScore() >= highestScorePlayer.getRoundScore()) {
                secondHighestScorePlayerIndex = highestScorePlayerIndex;
                highestScorePlayerIndex = i;
                continue;
            }

            if(secondHighestScorePlayerIndex == -1) {
                secondHighestScorePlayerIndex = i;
                continue;
            }

            if(player.getRoundScore() > secondHighestScorePlayer.getRoundScore()) {
                secondHighestScorePlayerIndex = i;
            }
        }

        if(this.App.Players[highestScorePlayerIndex].getRoundScore() == this.App.Players[secondHighestScorePlayerIndex].getRoundScore()) {
            this.startNewRound();
            return;
        }

        this.App.Players[highestScorePlayerIndex].increaseGameScore(parseInt(this.App.Players[highestScorePlayerIndex].getRoundScore() - this.App.Players[secondHighestScorePlayerIndex].getRoundScore()));
        // Did somebody win?
        
        let topPlayerIndex = -1;
        let secondPlayerIndex = -1;

        for(let i = 0; i < this.App.Players.length; i++) {
            if(topPlayerIndex == -1) {
                topPlayerIndex = i;
                continue;
            }

            if(this.App.Players[i].getGameScore() >= this.App.Players[topPlayerIndex].getGameScore()) {
                secondPlayerIndex = topPlayerIndex;
                topPlayerIndex = i;
                continue;
            }

            if(secondPlayerIndex == -1) {
                secondPlayerIndex = i;
            }

            if(this.App.Players[i].getGameScore() > this.App.Players[secondPlayerIndex].getGameScore()) {
                secondPlayerIndex = i;
            }
        }

        console.log(topPlayerIndex, secondPlayerIndex);
        if(this.App.Players[topPlayerIndex].getGameScore() != this.App.Players[secondPlayerIndex].getGameScore()) {
            if(this.App.Players[topPlayerIndex].getGameScore() >= 20) {
                this.playerWins(topPlayerIndex);
                return;
            }

            if(this.Round >= 4) {
                this.playerWins(topPlayerIndex);
                return;
            }
        }

        this.startNewRound();
    }

    startNewRound() {
        this.Round++;
        this.App.Players.forEach((player) => {
            player.setRoundScore(0);
        });

        this.App.PlayerInterface.render();
    }

    createPlayer(name, css, flip = false) {
        const player_wrapper = document.createElement('div');
        player_wrapper.classList.add(css);
        const player_name = document.createElement('h2');
        player_name.innerText = name;
        const player_game_score = document.createElement('div');
        player_game_score.classList.add('player-score');
        player_game_score.innerText = '0 Points';
        const player_round_score = document.createElement('div');
        player_round_score.classList.add('player-round-score');
        player_round_score.innerText = '0';
        const modify_score_wrapper = document.createElement('div');
        modify_score_wrapper.classList.add('player-modify-score-wrapper');
        const decrease_round_score = document.createElement('button');
        decrease_round_score.classList.add('nav-button');
        decrease_round_score.innerText = '-';
        const increase_round_score = document.createElement('button');
        increase_round_score.classList.add('nav-button');
        increase_round_score.innerText = '+';
        const flip_button = document.createElement('button');
        flip_button.classList.add('nav-button-small');
        flip_button.innerText = '- Flip -';
        flip_button.addEventListener('click', () => {
            player_wrapper.classList.toggle('flipped');
        });

        modify_score_wrapper.appendChild(decrease_round_score);
        modify_score_wrapper.appendChild(increase_round_score);

        player_wrapper.appendChild(player_name);
        player_wrapper.appendChild(player_game_score);
        player_wrapper.appendChild(player_round_score);
        player_wrapper.appendChild(modify_score_wrapper);
        if(flip) player_wrapper.appendChild(flip_button);

        document.getElementById('app').appendChild(player_wrapper);

        this.App.Players.push(new Player(player_round_score, player_game_score, increase_round_score, decrease_round_score));
    }

    playerWins(playerIndex) {
        switch(playerIndex) {
            case 0:
                this.App.PlayerInterface.openModal('Player One Wins!');
                break;
            case 1:
                this.App.PlayerInterface.openModal('Player Two Wins!');
                break;
            case 2:
                this.App.PlayerInterface.openModal('Player Three Wins!');
                break;
            case 3:
                this.App.PlayerInterface.openModal('Player Four Wins!');
                break;
        }
    }
}

class Player {
    roundScore;
    gameScore;
    roundScoreDisplay;
    gameScoreDisplay;
    increaseRoundScoreButton;
    decreaseRoundScoreButton;

    constructor(roundScoreDisplay, gameScoreDisplay, increaseRoundScore, decreaseRoundScore) {
        this.roundScore = 0;
        this.gameScore = 0;
        this.roundScoreDisplay = roundScoreDisplay;
        this.gameScoreDisplay = gameScoreDisplay;
        this.increaseRoundScoreButton = increaseRoundScore;
        this.decreaseRoundScoreButton = decreaseRoundScore;

        this.increaseRoundScoreButton.addEventListener('click', () => {
            this.increaseRoundScore(1);
        });

        this.decreaseRoundScoreButton.addEventListener('click', () => {
            this.increaseRoundScore(-1);
        });
    }

    increaseRoundScore(amt = 1) {
        this.roundScore += amt;
        if(this.roundScore < 0) this.roundScore = 0;
        this.roundScoreDisplay.innerText = this.roundScore;
    }

    increaseGameScore(amt = 1) {
        this.gameScore += amt;
        if(this.gameScore < 0) this.gameScore = 0;
        this.gameScoreDisplay.innerText = `${this.gameScore} Points`;
    }

    getRoundScore() {
        return this.roundScore;
    }

    getGameScore() {
        return this.gameScore;
    }

    setRoundScore(amt = 0) {
        this.roundScore = amt;
        console.log(this.roundScoreDisplay);
        if(this.roundScore < 0) this.roundScore = 0;
        this.roundScoreDisplay.innerText = this.roundScore;
    }
}

class PlayerInterface {
    App;
    Modal;

    constructor(App) {
        this.App = App;
        this.Modal = document.getElementById('modal');

        document.getElementById('modal_close_button').addEventListener('click', () => {
            this.Modal.close();
        });
    }

    openModal(title, message = ''   ) {
        document.getElementById('modal_title').innerText = title;
        document.getElementById('modal_message').innerText = message;
        this.Modal.showModal();
    }

    closeModal() {
        this.Modal.close();
    }

    render() {
        document.getElementById('round_counter').innerText = `Round ${this.App.Game.Round}`;
    }
}

window.addEventListener("load", () => {
    App['PlayerInterface'] = new PlayerInterface(App);
    App['Game'] = new Game(App);

    document.getElementById('two_players').addEventListener('click', () => {
        document.getElementById('app').innerHTML = '';

        App.Game.createPlayer('Player One', 'top-player', true);
        App.Game.createPlayer('Player Two', 'bottom-player');
        document.getElementById('round_counter').style.display = 'block';
        document.getElementById('end_round').style.display = 'block';
    });

    document.getElementById('three_players').addEventListener('click', () => {
        document.getElementById('app').innerHTML = '';

        App.Game.createPlayer('Player One', 'top-left-player', true);
        App.Game.createPlayer('Player Two', 'top-right-player', true);
        App.Game.createPlayer('Player Three', 'bottom-player', false);
        document.getElementById('round_counter').style.display = 'block';
        document.getElementById('end_round').style.display = 'block';
    });

    document.getElementById('four_players').addEventListener('click', () => {
        document.getElementById('app').innerHTML = '';

        App.Game.createPlayer('Player 1', 'top-left-player', true);
        App.Game.createPlayer('Player 2', 'top-right-player', true);
        App.Game.createPlayer('Player 3', 'bottom-left-player');
        App.Game.createPlayer('Player 4', 'bottom-right-player');
        document.getElementById('round_counter').style.display = 'block';
        document.getElementById('end_round').style.display = 'block';
    });

    document.getElementById('end_round').addEventListener('click', () => {
        App.Game.endRound();
    });
});