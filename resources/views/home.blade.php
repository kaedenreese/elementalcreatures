@push('css')
@endpush

@push('js')
@endpush

<x-head>
    <x-slot:title>
        {{ env('APP_NAME') }} - {{ env('APP_TAG') }}
    </x-slot>
</x-head>
<body>
@include('components.header')
            @include('components.socials')

<main>
        <div id="index_wrapper">
            <div class="grid-3">
                <img src="/images/cards/sets/2/fullsize/{{ $cards[0] }}.png" class="img-fit" alt="Elemental Creature">
                <img id="alpha_logo" src="images/alpha_creatures.webp" alt="Elemental Creatures Alpha Evolved" class="img-fit">
                <img src="/images/cards/sets/2/fullsize/{{ $cards[1] }}.png" class="img-fit" alt="Elemental Creature">
            </div>
            <div>
                <div class="nav-button buy-now-button"><a href="https://4gsgames.com/collections/elemental-creatures" target="_blank">Available for Preorder Now!</a></div>
            </div>
        </div>
    </main>

@include('components.footer')
</body>