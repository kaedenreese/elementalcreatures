@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <div class="session-message">{{ session('message') ?? '' }}</div>
            <h1>Elements</h1>
            <div><a href="{{ route('admin.elements.create') }}" class="site-create-button">Create</a></div>
            @if(sizeof($elements) == 0)
                <p>There are no elements to show yet</p>
            @endif
            @foreach ($elements as $element)
                <p><a href="{{ route('admin.elements.edit', ['element' => $element->id]) }}">{{ $element->name }}</a></p>
            @endforeach
        </div>
    </main>
</body>