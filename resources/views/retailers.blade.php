@push('css')
@endpush

@push('js')
@endpush

@include('components.head')
<body>
@include('components.header')

<main>
        <div id="wrapper">
            <section>
                <div class="h3-wrapper">
                    <div class="horizontal-bar"></div>
                        <h3>Become a Partnered Retailer</h3>
                    <div class="horizontal-bar"></div>
                </div>

                <p class="description-text">Do you want to carry Elemental Creatures TCG product? Do you want to run official events and tournaments? <a href="mailto:elementalcreatures@gmail.com">Contact Us</a> and let us know.</p>
                <div class="flex-between">
                    <div><img src="../images/creatures/sets/1/069.webp" alt="Prismeedle" class="hero-content-box-img" style="max-height: 100px;"></div>
                    <div><img src="../images/creatures/sets/1/166.webp" alt="Rokusei" class="hero-content-box-img" style="max-width: 100px;"></div>
                    <div><img src="../images/creatures/sets/1/006.webp" alt="Venwurm" class="hero-content-box-img" style="max-width: 100px;"></div>
                    <div><img src="../images/creatures/sets/1/005.webp" alt="Naryu" class="hero-content-box-img" style="max-width: 100px;"></div>
                </div>
            </section>

            <section>
                <div class="h3-wrapper">
                    <div class="horizontal-bar"></div>
                        <h3>Our Partnered Retailers</h3>
                    <div class="horizontal-bar"></div>
                </div>

                <div class="data-list-wrapper">
                    @if (sizeof($retailers) == 0)
                        <p>There are no current retailers! Check back soon to see them as they are added!</p>
                    @endif
                    @foreach ($retailers as $retailer)
                        <div class="retailer-data">
                            <h4>{{ $retailer->name }}</h4>
                            <div class="retailer-address">{!! $retailer->address !!}</div>
                            @if($retailer->website != '')
                            <div><a href="{{ $retailer->website }}" target="_new">Website</a></div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>

@include('components.footer')
</body>