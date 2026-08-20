@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Update Retailer</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.retailers.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.retailers.update', ['retailer' => $retailer->id]) }}">
                @csrf
                @method('put')
                <label for="name">Retailer Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') ?? $retailer->name }}">
                <label for="address">Retailer Address</label>
                <input type="textbox" id="address" name="address" value="{{ old('address') ?? $retailer->address }}">
                <label for="website">Retailer Website</label>
                <input type="textbox" id="website" name="website" value="{{ old('website') ?? $retailer->website }}">
                <label for="priority">Retailer Priority</label>
                <input type="textbox" id="priority" name="priority" required value="{{ old('priority') ?? $retailer->priority }}">
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