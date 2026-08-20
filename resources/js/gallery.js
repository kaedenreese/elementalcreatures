import { KaedenFetcher } from "./KaedenFetcher.js";

window.addEventListener('load', () => {
    App.init();
});

class Gallery {
    CardsBySet;
    Parameters = {
        'set': 2,
        'elements': [],
        'notelements': [],
        'species': [],
        'notspecies': [],
        'query': ''
    };

    constructor() {
    }

    async init() {
        // Pull all card info
        const route = '/api/cards';

        let json = await KaedenFetcher(route);

        this.CardsBySet = json;
        this.generateCards();

        const textToggle = document.getElementById('text_only_mode');
        textToggle.addEventListener('input', () => {
            this.generateCards();
        });

        
        const dialog = document.getElementById('card_display');
        const closeButton = document.querySelector('.close-dialog');
        closeButton.addEventListener('click', () => {
            dialog.close();
        });

        const starterSet = document.querySelector('[data-cardset="' + this.Parameters.set + '"]');
        starterSet.classList.remove('option-noselected');
        starterSet.classList.add('option-selected');

        let sets = document.querySelectorAll('[data-cardset]');
        sets.forEach((button) => {
            button.addEventListener("click", (e) => {
                const cardset_id = button.getAttribute('data-cardset');
                sets.forEach((set) => {
                    set.classList.remove('option-selected');
                    set.classList.add('option-noselected');
                });

                if(cardset_id != this.Parameters.set) {
                    this.Parameters.set = cardset_id;
                    e.target.classList.remove('option-noselected');
                    e.target.classList.add('option-selected');
                }
                this.generateCards();
            });
        });
    }

    generateCards() {
        const gallery = document.getElementById('gallery');
        const textToggle = document.getElementById('text_only_mode').checked;

        gallery.innerHTML = '';

        let results = [];
        this.CardsBySet.forEach((set) => {
            // Filter cards not in this set
            if(set.id == this.Parameters.set) {
                const cards = set.cards;

                cards.forEach((card) => {
                    // Process selections
                    results.push(card);
                });
            }
        });

        if(results.length == 0) document.getElementById('gallery').innerHTML = '<div style="text-align: center;">There are no cards that match your criteria...</div>';
        else {
            if(textToggle){
                gallery.style.display = "unset";
                results.forEach((card) => {
                    const cardWrapper = document.createElement('div');
                    cardWrapper.classList.add('card-wrapper');

                    const cardTitle = document.createElement('div');
                    cardTitle.classList.add('h3-wrapper');
                    const horizontalBar = document.createElement('div');
                    horizontalBar.classList.add('horizontal-bar');
                    const horizontalBar2 = document.createElement('div');
                    horizontalBar2.classList.add('horizontal-bar');
                    const cardName = document.createElement('h3');
                    cardName.innerText = card.name;

                    cardTitle.appendChild(horizontalBar);
                    cardTitle.appendChild(cardName);
                    cardTitle.appendChild(horizontalBar2);

                    const cardTopRow = document.createElement('div');
                    cardTopRow.classList.add('card-info-wrapper');
                    const cardLevel = document.createElement('div');
                    cardLevel.innerText = 'Level ' + card.level;
                    const cardPower = document.createElement('div');
                    cardPower.innerText = 'Power ' + card.power;
                    const cardNumber = document.createElement('div');
                    cardNumber.innerText = '# ' + card.number;

                    cardTopRow.appendChild(cardLevel);
                    cardTopRow.appendChild(cardPower);
                    cardTopRow.appendChild(cardNumber);

                    const cardEffectType = document.createElement('p');
                    cardEffectType.classList.add('card-effect-type');
                    cardEffectType.innerText = card.effect_type.name + ' Effect';

                    const cardEffect = document.createElement('p');
                    cardEffect.classList.add('card-effect-text');
                    cardEffect.innerText = card.effect;

                    cardWrapper.appendChild(cardTitle);
                    cardWrapper.appendChild(cardEffectType);
                    cardWrapper.appendChild(cardEffect);
                    cardWrapper.appendChild(cardTopRow);

                    /*cardTopRow.appendChild(cardLevel);
                    cardTopRow.appendChild(cardPower);

                    cardWrapper.appendChild(cardTopRow);
                    cardWrapper.appendChild(cardEffect);
                    cardWrapper.appendChild(cardEffect);
                    cardWrapper.appendChild(cardNumber);*/
                    gallery.appendChild(cardWrapper);
                });

                return;
            }

            // Graphical version
            gallery.style.display = "flex";
            gallery.style.flexWrap = "wrap";
            gallery.style.gap = '10px';
            results.forEach((card) => {
                const thumbnailPath = '/images/cards/sets/' + card.card_set_id + '/thumbnails/';
                const cardwrapper = document.createElement('div');
                cardwrapper.classList.add('card-image-wrapper');

                const image = document.createElement('img');
                let imageFileName = card.number + '.png';
                if(card.number < 10) imageFileName = '00' + card.number + '.png';
                else if(card.number < 100) imageFileName = '0' + card.number + '.png';

                image.classList.add('img-fit');
                image.src = thumbnailPath + imageFileName;
                image.alt = card.name;

                cardwrapper.appendChild(image);
                cardwrapper.addEventListener('click', () => {
                    const dialog = document.getElementById('card_display');
                    const cardImage = document.getElementById('card_image');
                    const fullsizePath = '/images/cards/sets/' + card.card_set_id + '/fullsize/';

                    cardImage.innerHTML = '';
                    const newImage = document.createElement('img');
                    newImage.alt = card.name;
                    newImage.src = fullsizePath + imageFileName;
                    newImage.classList.add('img-fit');

                    cardImage.appendChild(newImage);

                    dialog.showModal();
                });

                gallery.appendChild(cardwrapper);
            });
        }
    }
}

const App = new Gallery();