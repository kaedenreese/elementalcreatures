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
                        <h3>Event Calendar</h3>
                    <div class="horizontal-bar"></div>
                </div>

                <div class="data-list-wrapper">
                    @if (sizeof($events) == 0)
                        <p>There are no current events! Check back soon to see them as they are added!</p>
                    @endif
                    @foreach ($events as $event)
                        <div class="event-data">
                            <h4>{{ $event->name }}</h4>
                            <div class="retailer-address">{{ $event->date }}</div>
                            <div class="retailer-address">{{ $event->description }}</div>
                        </div>
                    @endforeach
                </div>
            </section>

            <div class="creature-image-centered">
                <img src="images/creatures/sets/1/049.webp" alt="Daracarid" class="img-fit">
            </div>
        </div>
    </main>

@include('components.footer')
</body>