@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <div class="session-message">{{ session('message') ?? '' }}</div>
            <h1>Card Sets</h1>
            <div><a href="{{ route('admin.cardsets.create') }}" class="site-create-button">Create</a></div>
            @if(sizeof($cardsets) == 0)
                <p>There are no cardsets to show yet</p>
            @endif
            @foreach ($cardsets as $cardset)
                <p><a href="{{ route('admin.cardsets.edit', ['cardset' => $cardset->id]) }}">{{ $cardset->name }}</a></p>
            @endforeach
        </div>
    </main>
</body>