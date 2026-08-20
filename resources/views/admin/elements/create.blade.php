@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Create New Element</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.elements.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.elements.store') }}">
                @csrf
                <label for="name">Element Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') }}">
                <label for="description">Description</label>
                <input type="textbox" id="description" name="description" value="{{ old('description') }}">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                    @endforeach
                @endif
                <button type="submit" class="site-button">Save</button>
            </form>
        </div>
    </main>
</body>