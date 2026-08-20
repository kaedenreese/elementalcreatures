@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Update Species</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.species.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.species.update', ['species' => $species->id]) }}">
                @csrf
                @method('put')
                <label for="name">Species Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') ?? $species->name }}">
                <label for="description">Description</label>
                <input type="textbox" id="description" name="description" value="{{ old('description') ?? $species->description }}">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                    @endforeach
                @endif
                <button type="submit" class="site-button">Update</button>
            </form>
        </div>
    </main>
</body>