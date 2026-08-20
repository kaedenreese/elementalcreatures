@push('css')
    @vite(['resources/css/gallery.css'])
@endpush

@push('js')
    @vite(['resources/js/gallery.js'])
@endpush

@include('components.head')
<body>
@include('components.header')
    <dialog closedby="any" id="card_display">
        <div class="card-image"></div>
        <button class="close-dialog">Close</button>
    </dialog>

    <label for="text_only_mode">Text Only</label>
    <input type="checkbox" id="text_only_mode" name="text_only_mode">

    <label for="search">Search</label>
    <input type="textbox" id="search" name="search" placeholder="Search">
@include('components.footer')
</body>