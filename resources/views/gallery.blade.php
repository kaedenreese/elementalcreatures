@push('css')
    @vite(['resources/css/gallery.css', 'resources/css/spinner.css'])
@endpush

@push('js')
    @vite(['resources/js/gallery.js'])
@endpush

@include('components.head')
<body>
@include('components.header')
<div id="wrapper">
    <dialog closedby="any" id="card_display">
        <div id="card_image"></div>
        <button class="close-dialog">Close</button>
    </dialog>

    <label for="search" style="display: none;">Search</label>
    <input type="textbox" id="search" name="search" placeholder="Search">

    <div><label for="text_only_mode"><input type="checkbox" id="text_only_mode" name="text_only_mode"> Text Only</label></div>

    <h2>Sets</h2>
    <div class="flex-wrap">
        @foreach ($cardsets as $cardset)
            <button data-cardset="{{ $cardset->id }}" class="option-noselected">{{ $cardset->name }}</button>
        @endforeach
    </div>
    <h2>Elements</h2>
    <div class="flex-wrap">
        @foreach ($elements as $element)
            <button data-element="{{ $element->id }}" class="option-noselected">{{ $element->name }}</button>
        @endforeach
    </div>
    <h2>Species</h2>
    <div class="flex-wrap" style="margin-bottom: 20px;">
        @foreach ($species as $specimin)
            <button data-species="{{ $specimin->id }}" class="option-noselected">{{ $specimin->name }}</button>
        @endforeach
    </div>
    <div id="gallery">
        
        <div class="spinner-div">
            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
</div>
</body>