@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Edit Event</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.events.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.events.update', ['event' => $event->id]) }}">
                @csrf
                @method('put')
                <label for="name">Event Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') ?? $event->name }}">
                <label for="description">Event Description</label>
                <input type="textbox" id="description" name="description" value="{{ old('description') ?? $event->description }}">
                <label for="date">Event Date</label>
                <input type="datetime-local" id="date" name="date" value="{{ old('date') ?? $event->date }}" style="margin-bottom: 10px">
                <label for="recurring">
                    <input type="checkbox" id="recurring" name="recurring" {{ old('recurring') || $event->recurring ? 'checked' : '' }}>
                    Recurring?
                </label>
                <label for="online">
                    <input type="checkbox" id="online" name="online" {{ old('online') || $event->online ? 'checked' : '' }}>
                    Online Only?
                </label>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                    @endforeach
                @endif
                <button type="submit" class="site-button">Save</button>
            </form>
            <form method="post" action="{{ route('admin.events.destroy', ['event' => $event->id]) }}" onsubmit="return confirm('This will permanently delete this event. Are you sure?');">
                @method('delete')
                <button type="submit" class="site-button">Delete</button>
            </form>
        </div>
    </main>
</body>