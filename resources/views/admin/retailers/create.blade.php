@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Create New Retailer</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.retailers.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.retailers.store') }}">
                @csrf
                <label for="name">Retailer Name</label>
                <input type="textbox" id="name" name="name" required value="{{ old('name') }}">
                <label for="address">Retailer Address</label>
                <textarea type="textbox" id="address" name="address">{{ old('address') }}</textarea>
                <label for="website">Retailer Website</label>
                <input type="textbox" id="website" name="website" value="{{ old('website') }}">
                <label for="phone_number">Phone Number</label>
                <input type="textbox" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                <label for="shipping">Shipping Available</label>
                <input type="checkbox" id="shipping" name="shipping" {{ old('shipping') ? 'checked' : '' }}>
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