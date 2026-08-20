@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Update Effect Type</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.effecttypes.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.effecttypes.update', ['effecttype' => $effecttype->id]) }}">
                @csrf
                @method('put')
                <label for="name">Effect Type Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') ?? $effecttype->name }}">
                <label for="description">Description</label>
                <input type="textbox" id="description" name="description" value="{{ old('description') ?? $effecttype->description }}">
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