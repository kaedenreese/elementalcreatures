@push('css')
@endpush

@push('js')
@endpush

@include('components.head')
<body>
@include('components.header')

<main>
        <div id="index_wrapper">
            <div id="socials">
                <div>Follow Us!</div>
                <div><a href="https://discord.gg/E76nDNQ339" target="_blank"><img src="images/socials/discord.webp" alt="Discord" class="social-icon"></a></div>
                <div><a href="https://www.facebook.com/ElementalCreaturesTCG" target="_blank"><img src="images/socials/facebook.webp" alt="Facebook" class="social-icon"></a></div>
                <div><a href="https://www.reddit.com/r/elementalcreatures/" target="_blank"><img src="images/socials/reddit.webp" alt="Reddit" class="social-icon"></a></div>
                <div><a href="https://www.instagram.com/elemental_creatures_tcg/?fbclid=IwY2xjawOMsNBleHRuA2FlbQIxMABicmlkETFzQjZzNUw1a3FPVnVobUx2c3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHnaKWF1MRVMr0_nY_9RP9RvxCfF8-0qoo3F5CTifo08h3xt8E4BjuaxwZDqp_aem_VVNIwq6_-x_LIOeImKmnRA#" target="_blank"><img src="images/socials/instagram.webp" alt="Instagram" class="social-icon"></a></div>
            </div>
            <div class="grid-3">
                <img src="/images/cards/sets/2/promo/CRUSADER_PROMO_Skalizard.png" class="img-fit" alt="Elemental Creature">
                <img id="alpha_logo" src="images/alpha_creatures.webp" alt="Elemental Creatures Alpha Evolved" class="img-fit">
                <img src="/images/cards/sets/2/promo/CRUSADER_PROMO_Tormortar.png" class="img-fit" alt="Elemental Creature">
            </div>
            <div>
                <div class="nav-button buy-now-button"><a href="https://4gsgames.com/collections/elemental-creatures" target="_blank">Available for Preorder Now!</a></div>
            </div>
        </div>
    </main>

@include('components.footer')
</body>