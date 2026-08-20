import { KaedenFetcher } from "./KaedenFetcher.js";

const App = new Gallery();

window.addEventListener('load', () => {
    App.init();
});

class Gallery {
    constructor() {
        // Pull all card info
        const route = '/api/cards';
    }
}