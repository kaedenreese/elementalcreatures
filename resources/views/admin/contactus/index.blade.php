@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <div class="session-message">{{ session('message') ?? '' }}</div>
            <h1>Contact Page</h1>
            <p>These are listed in the order they were received. Bold messages are new and unread.</p>
            @if(sizeof($contactus) == 0)
                <p>There are no messages to show yet</p>
            @endif
            @foreach ($contactus as $contact)
                <p><a href="{{ route('admin.contactus.show', ['contactus' => $contact->id]) }}">{{ $contact->name }}</a></p>
            @endforeach
        </div>
    </main>
</body>