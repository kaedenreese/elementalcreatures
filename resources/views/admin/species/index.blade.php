@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <div class="session-message">{{ session('message') ?? '' }}</div>
            <h1>Species</h1>
            <div><a href="{{ route('admin.species.create') }}" class="site-create-button">Create</a></div>
            @if(sizeof($species) == 0)
                <p>There are no species to show yet</p>
            @endif
            @foreach ($species as $specimin)
                <p><a href="{{ route('admin.species.edit', ['species' => $specimin->id]) }}">{{ $specimin->name }}</a></p>
            @endforeach
        </div>
    </main>
</body>