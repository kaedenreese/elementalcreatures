@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Update Element</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.elements.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.elements.update', ['element' => $element->id]) }}">
                @csrf
                <label for="name">Element Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') ?? $element->name }}">
                <label for="description">Description</label>
                <input type="textbox" id="description" name="description" required value="{{ old('description') ?? $element->description }}">
                <button type="submit" class="site-button">Update</button>
            </form>
        </div>
    </main>
</body>