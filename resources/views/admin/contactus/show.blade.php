@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
    <main>
        <div id="wrapper">
            <a href="{{ route('admin.contactus.index') }}">Go Back</a>
            <h1>Message from {{ $contactu->name }}</h1>
            <p>Email: {{ $contactu->email }}</p>
            <p>{{ $contactu->message }}</p>
            <form method="post" action="{{ route('admin.contactus.destroy', ['contactu' => $contactu->id]) }}" onsubmit="return confirm('This will permanently delete this message. Are you sure?');">
                @csrf
                @method('delete')
                <button type="submit" class="site-button">Delete</button>
            </form>
        </div>
    </main>
</body>