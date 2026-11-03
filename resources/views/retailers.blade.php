@push('css')
    @vite(['resources/css/retailers.css'])
@endpush

@push('js')
@endpush

<x-head>
    <x-slot:title>
        Retailers | {{ config('app.name') }} - {{ config('app.tag') }}
    </x-slot>
</x-head>
<body>
@include('components.header')
    @include('components.socials')

<main>
        <div id="wrapper">
            <section>
                <div class="h3-wrapper">
                    <div class="horizontal-bar"></div>
                        <h3>Become a Partnered Retailer</h3>
                    <div class="horizontal-bar"></div>
                </div>

                
                <div>
                    <img src="{{ asset('images/temp_banner.png') }}" class="img-fit" alt="Elemental Creature">
                </div>
                <div>
                    <p style="text-align: center;"><a href="{{ route('contactus') }}">Contact Us</a></p>
                </div>
            </section>

            <section>
                <div class="h3-wrapper">
                    <div class="horizontal-bar"></div>
                        <h3>Our Partnered Retailers</h3>
                    <div class="horizontal-bar"></div>
                </div>

                <div class="retailer-grid">
                    <div class="retailer" style="max-width: 600px; margin: 0 auto; margin-bottom: 20px;">
                        <div class="inner-retailer-wrapper">
                            <div class="find-me-listings">
                                <div class="gradient-background">
                                    Find me on product listings with shipping!
                                </div>
                                <div>
                                    <img src="{{ asset('images/retailers/shipping.webp') }}" class="we-ship-img" alt="We Ship!">
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (sizeof($retailers) == 0)
                        <p>There are no current retailers! Check back soon to see them as they are added!</p>
                    @endif
                    @foreach($retailers as $retailer)
                    <div class="retailer">
                        <div class="inner-retailer-wrapper">
                            <div class="inner-retailer">
                                <div class="retailer-logo">
                                    @if($retailer->logo != null)
                                    <div><img src="{{ asset('images/retailers/' . $retailer->logo ) }}" alt="{{ $retailer->name }}" class="retailer-logo-img"></div>
                                    @endif
                                </div>
                                <div class="retailer-info">
                                    <div class="retailer-name">{{ $retailer->name }}</div>
                                    
                                    <div class="gradient-bar" style="margin-top: 15px;"></div>
                                    <div class="retailer-address" style="margin-top: 15px; margin-bottom: 15px;">{!! $retailer->address !!}</div>
                                    <div class="gradient-bar" style="margin-bottom: 15px;"></div>

                                    <div class="retailer-phone">{{ $retailer->phone_number }}</div>

                                </div>
                            </div>
                            @if($retailer->website)
                            <div class="retailer-link">
                                <a href="{{ $retailer->website }}" target="_blank" rel="noopener noreferrer">Online Listings for Elemental Creatures</a>
                            </div>
                            @endif
                            @if($retailer->shipping)
                            <div class="retailer-online-shipping">
                                <img src="{{ asset('images/retailers/shipping.webp') }}" alt="We Ship!" class="shipping-img">
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>

@include('components.footer')
</body>