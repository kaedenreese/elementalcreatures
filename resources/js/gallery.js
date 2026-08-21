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

    elementKey = [
        'fire',
        'air',
        'rock',
        'water',
        'electric',
        'dark',
        'spirit',
        'omniment',
        'nature',
        'ice'
    ]

    constructor() {
    }

    async init() {
        // Pull all card info
        const route = '/api/cards';

        let json = await KaedenFetcher(route);
        console.log(json);

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

        const searchBox = document.getElementById('search');
        searchBox.addEventListener('input', (e) => {
            this.Parameters.query = e.target.value;
            this.generateCards();
        });

        let sets = document.querySelectorAll('[data-cardset]');
        sets.forEach((button) => {
            button.addEventListener("click", (e) => {
                const cardset_id = button.getAttribute('data-cardset');
                sets.forEach((set) => {
                    if(cardset_id != this.Parameters.set) {
                        set.classList.remove('option-selected');
                        set.classList.add('option-noselected');
                    }
                });

                if(cardset_id != this.Parameters.set) {
                    this.Parameters.set = Number(cardset_id);
                    e.target.classList.remove('option-noselected');
                    e.target.classList.add('option-selected');
                }
                this.generateCards();
            });
        });

        let elements = document.querySelectorAll('[data-element]');
        elements.forEach((button) => {
            button.addEventListener("click", (e) => {
                const element_id = Number(button.getAttribute('data-element'));
                const viewElement = this.Parameters.elements.indexOf(element_id);
                const hideElement = this.Parameters.notelements.indexOf(element_id);

                if(viewElement != -1) {
                    this.Parameters.elements.splice(viewElement, 1);
                    this.Parameters.notelements.push(Number(element_id));
                    e.target.classList.remove('option-selected');
                    e.target.classList.add('option-deselected');
                    this.generateCards();
                    return;
                }

                if(hideElement != -1) {
                    this.Parameters.notelements.splice(hideElement, 1);
                    e.target.classList.remove('option-deselected');
                    e.target.classList.add('option-noselected');
                    this.generateCards();
                    return;
                }

                this.Parameters.elements.push(Number(element_id));
                e.target.classList.remove('option-noselected');
                e.target.classList.add('option-selected');
                this.generateCards();
            });
        });

        

        let species = document.querySelectorAll('[data-species]');
        species.forEach((button) => {
            button.addEventListener("click", (e) => {
                const species_id = Number(button.getAttribute('data-species'));
                const viewElement = this.Parameters.species.indexOf(species_id);
                const hideElement = this.Parameters.notspecies.indexOf(species_id);

                if(viewElement != -1) {
                    this.Parameters.species.splice(viewElement, 1);
                    this.Parameters.notspecies.push(Number(species_id));
                    e.target.classList.remove('option-selected');
                    e.target.classList.add('option-deselected');
                    this.generateCards();
                    return;
                }

                if(hideElement != -1) {
                    this.Parameters.notspecies.splice(hideElement, 1);
                    e.target.classList.remove('option-deselected');
                    e.target.classList.add('option-noselected');
                    this.generateCards();
                    return;
                }

                this.Parameters.species.push(Number(species_id));
                e.target.classList.remove('option-noselected');
                e.target.classList.add('option-selected');
                this.generateCards();
            });
        });
    }

    checkElement(card) {
        let hasElement = false;

        for(let i = 0; i < card.elements.length; i++) {
            if(this.Parameters.elements.length != 0) {
                if(this.Parameters.elements.includes(card.elements[i].id)) {
                    hasElement = true;
                };
            }
            if(this.Parameters.notelements.includes(card.elements[i].id)) return false;
        }

        if(!hasElement && this.Parameters.elements.length != 0) return false;
        return true;
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
                    if(!this.checkElement(card)) return;
                    // Process selections
                    if(this.Parameters.notspecies.includes(card.species_id)) return;
                    if(this.Parameters.species.length != 0) {
                        if(!this.Parameters.species.includes(card.species_id)) return;
                    }

                    // Finally, queries
                    if(this.Parameters.query.length > 1) {
                        if(!card.effect.toLowerCase().includes(this.Parameters.query.toLowerCase()) && !card.name.toLowerCase().includes(this.Parameters.query.toLowerCase())) return;
                    }
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

                    const species = document.createElement('div');
                    species.style.textAlign = 'center';
                    species.innerText = card.species_name;
                    species.style.marginBottom = '10px';

                    const elementList = document.createElement('div');
                    elementList.classList.add('flex-center');
                    elementList.style.marginBottom = '10px';

                    card.elements.forEach((element) => {
                        const index = element.id - 1;
                        //if(index == 7) return;
                        console.log(index);
                        const imgWrapper = document.createElement('div');
                        imgWrapper.classList.add('gallery-element-wrapper');
                        const img = document.createElement('img');
                        img.src = '/images/elements/element_' + this.elementKey[index] + '.webp';
                        img.classList.add('img-fit-vertical');
                        //img.alt = this.elementKey[index][0].toUpperCase() + this.elementKey[index].slice(1);

                        imgWrapper.appendChild(img);

                        elementList.appendChild(imgWrapper);
                    });

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
                    cardWrapper.appendChild(species);
                    cardWrapper.appendChild(elementList);
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