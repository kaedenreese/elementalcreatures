@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <div class="session-message">{{ session('message') ?? '' }}</div>
            <h1>Retailers</h1>
            <p>These are listed in the order they will appear on the main website. Retailers with a higher Priority will appear higher on the list.</p>
            <div><a href="{{ route('admin.retailers.create') }}" class="site-create-button">Create</a></div>
            @if(sizeof($retailers) == 0)
                <p>There are no retailers to show yet</p>
            @endif
            @foreach ($retailers as $retailer)
                <p><a href="{{ route('admin.retailers.edit', ['retailer' => $retailer->id]) }}">{{ $retailer->name }}</a></p>
            @endforeach
        </div>
    </main>
</body>