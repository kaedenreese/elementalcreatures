@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Update Card Set</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.cardsets.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.cardsets.update', ['cardset' => $cardset->id]) }}">
                @csrf
                @method('put')
                <label for="name">Set Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') ?? $cardset->name }}">
                <label for="description">Description</label>
                <input type="textbox" id="description" name="description" required value="{{ old('description') ?? $cardset->description }}">
                <label for="release_date">Release Date</label>
                <input type="datetime-local" id="release_date" name="release_date" value="{{ old('release_date') ?? $cardset->release_date }}">
                <button type="submit" class="site-button">Update</button>
            </form>
        </div>
    </main>
</body>