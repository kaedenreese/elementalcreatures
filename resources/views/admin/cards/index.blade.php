@push('css')
    @vite(['resources/css/app.css'])
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <div class="session-message">{{ session('message') ?? '' }}</div>
            <h1>Cards</h1>
            <div><a href="{{ route('admin.cards.create') }}" class="site-create-button">Create</a></div>
            @if(sizeof($cards) == 0)
                <p>There are no cards to show yet</p>
                @else
                {{ $cards->links() }}
            @endif
            @foreach ($cards as $card)
                <p><span class="cardset_label">{{ $card->cardset_name }}</span> #{{ $card->number }} <a href="{{ route('admin.cards.edit', ['card' => $card->id])  }}">{{ $card->name }}</a></p>
            @endforeach
        </div>
    </main>
</body>