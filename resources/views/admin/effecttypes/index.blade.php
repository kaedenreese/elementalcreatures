@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <div class="session-message">{{ session('message') ?? '' }}</div>
            <h1>Effect Types</h1>
            <div><a href="{{ route('admin.effecttypes.create') }}" class="site-create-button">Create</a></div>
            @if(sizeof($effecttypes) == 0)
                <p>There are no effect types to show yet</p>
            @endif
            @foreach ($effecttypes as $effecttype)
                <p><a href="{{ route('admin.effecttypes.edit', ['effecttype' => $effecttype->id]) }}">{{ $effecttype->name }}</a></p>
            @endforeach
        </div>
    </main>
</body>