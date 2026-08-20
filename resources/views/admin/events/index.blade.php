@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <div class="session-message">{{ session('message') ?? '' }}</div>
            <h1>Events</h1>
            <p>These are listed in the order they will appear on the main website, ordered by date. Events listed as "Recurring" will show the specified day of the week instead of a specific date.</p>
            <div><a href="{{ route('admin.events.create') }}" class="site-create-button">Create</a></div>
            @if(sizeof($events) == 0)
                <p>There are no event to show yet</p>
            @endif
            @foreach ($events as $event)
                <p><a href="{{ route('admin.events.edit', ['event' => $event->id]) }}">{{ $event->name }}</a></p>
            @endforeach
        </div>
    </main>
</body>