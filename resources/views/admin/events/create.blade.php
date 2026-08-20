@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Create New Event</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.events.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.events.store') }}">
                @csrf
                <label for="name">Event Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') }}">
                <label for="description">Event Description</label>
                <input type="textbox" id="description" name="description" value="{{ old('description') }}">
                <label for="date">Event Date</label>
                <input type="datetime-local" id="date" name="date" value="{{ old('date') }}" style="margin-bottom: 10px">
                <label for="recurring">
                    <input type="checkbox" id="recurring" name="recurring" {{ old('recurring') ? 'checked' : '' }}>
                    Recurring?
                </label>
                <label for="online">
                    <input type="checkbox" id="online" name="online" {{ old('online') ? 'checked' : '' }}>
                    Online Only?
                </label>
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