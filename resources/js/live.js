window.addEventListener("load", () => {
    const backToSiteButton = document.querySelector(".go-back");
    const flipButton = document.querySelector(".flip");
    const playerOne = document.querySelector(".player-1");

    flipButton.addEventListener("click", () => {
        playerOne.classList.toggle("do-flip");
    });

    backToSiteButton.addEventListener("click", () => {
        window.location.href = "/";
    });

    g = new Game();
    g.init();
});

let g;

class Game {
    constructor() {
        this.divs = {
            playerOneScoreDiv: document.querySelector(".player-one-points"),
            playerTwoScoreDiv: document.querySelector(".player-two-points"),
            playerOnePower: document.querySelector("#player-one-power"),
            playerTwoPower: document.querySelector("#player-two-power"),
            roundNumber: document.querySelector(".round-number"),

            playerOnePowerUp: document.querySelector(".player-one-power-up"),
            playerOnePowerDown: document.querySelector(".player-one-power-down"),
            playerTwoPowerUp: document.querySelector(".player-two-power-up"),
            playerTwoPowerDown: document.querySelector(".player-two-power-down"),

            endRoundButton: document.querySelector("#end-round"),
            resetButton: document.querySelector("#reset"),
            modalNewGameButton: document.querySelector("#modal-new-game-button"),
            modalCloseButton: document.querySelector("#modal-close-button"),
            modal: document.querySelector("#modal"),
            modalTitle: document.querySelector("#modal-title"),
            modalMessage: document.querySelector("#modal-message")
        };
        this.playerOneName = "Player One";
        this.playerTwoName = "Player Two";
        this.playerOneScore = 0;
        this.playerTwoScore = 0;
        this.playerOnePower = 0;
        this.playerTwoPower = 0;
        this.roundNumber = 1;
    }
    

    init() {
        this.divs.modalCloseButton.addEventListener("click", () => {
            this.divs.modal.close();
        });

        this.divs.modalNewGameButton.addEventListener("click", () => {
            this.divs.modal.close();
            this.roundNumber = 1;
            this.updateRounds();
            this.resetScores();
            this.resetPowers();
        });
        
        this.divs.playerOnePowerUp.addEventListener("click", () => {
            this.playerOnePower++;
            this.updatePower();
        });

        this.divs.playerOnePowerDown.addEventListener("click", () => {
            this.playerOnePower--;
            this.updatePower();
        });

        this.divs.playerTwoPowerUp.addEventListener("click", () => {
            this.playerTwoPower++;
            this.updatePower();
        });

        this.divs.playerTwoPowerDown.addEventListener("click", () => {
            this.playerTwoPower--;
            this.updatePower();
        });

        this.divs.endRoundButton.addEventListener("click", () => {
            this.roundNumber++;
            this.updateRounds();
            this.endRound();
            this.resetPowers();
        });

        this.divs.resetButton.addEventListener("click", () => {
            this.roundNumber = 1;
            this.updateRounds();
            this.resetScores();
            this.resetPowers();
        });

        this.divs.playerOnePower.addEventListener("input", (e) => {
            this.playerOnePower = parseInt(e.target.value) || 0;
        });

        this.divs.playerTwoPower.addEventListener("input", (e) => {
            this.playerTwoPower = parseInt(e.target.value) || 0;
        });

        this.resetScores();

        this.divs.playerOnePower.value = 0;
        this.divs.playerTwoPower.value = 0;
    }

    updatePower() {
        this.divs.playerOnePower.value = this.playerOnePower;
        this.divs.playerTwoPower.value = this.playerTwoPower;
    }

    updateScores() {
        this.divs.playerOneScoreDiv.textContent = `${this.playerOneScore} Points`;
        this.divs.playerTwoScoreDiv.textContent = `${this.playerTwoScore} Points`;
    }

    updateRounds() {
        this.divs.roundNumber.textContent = this.roundNumber;
    }

    endRound() {
        // Logic for ending the round can be added here
        if(this.playerOnePower > this.playerTwoPower) {
            this.playerOneScore += this.playerOnePower - this.playerTwoPower;
        } else if(this.playerTwoPower > this.playerOnePower) {
            this.playerTwoScore += this.playerTwoPower - this.playerOnePower;
        }
        this.updateScores();

        if(this.roundNumber > 4) {
            console.log("GameOver");
            if(this.playerOneScore > this.playerTwoScore) {
                this.divs.modalTitle.textContent = "Game Over";
                this.divs.modalMessage.textContent = `${this.playerOneName} Wins!`;
                console.log(this.divs.modal);
                this.divs.modal.showModal();
            } else if(this.playerTwoScore > this.playerOneScore) {
                this.divs.modalTitle.textContent = "Game Over";
                this.divs.modalMessage.textContent = `${this.playerTwoName} Wins!`;
                this.divs.modal.showModal();
            }
        }
    }

    resetScores() {
        this.playerOneScore = 0;
        this.playerTwoScore = 0;
        this.updateScores();
    }

    resetPowers() {
        this.playerOnePower = 0;
        this.playerTwoPower = 0;
        this.updatePower();
    }
}