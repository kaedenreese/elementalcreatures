@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
    <main>
        <div id="wrapper">
            <h1>Login</h1>
            <form method="post" action="{{ route('doLogin') }}">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                    @endforeach
                @endif
                <button type="submit" class="site-button">Login</button>
            </form>
        </div>
    </main>
</body>