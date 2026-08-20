@push('css')
    @vite(['resources/css/admin.css'])
@endpush

@include('components.head')

<body>
@include('components.admin.nav')
 <main>
        <div id="wrapper">
            <h1>Update Card</h1>
            <div style="margin-bottom: 10px;"><a href="{{ route('admin.cards.index') }}">Cancel</a></div>
            <form method="post" action="{{ route('admin.cards.update', ['card' => $card->id]) }}">
                @csrf
                @method('put')
                <label for="name">Card Name</label>
                <input type="textbox" id="name" name="name" required autofocus value="{{ old('name') ?? $card->name }}">
                <label for="level">Card Level</label>
                <input type="number" id="level" name="level" required value="{{ old('level') ?? $card->level }}">
                <label for="power">Card Power</label>
                <input type="number" id="power" name="power" required value="{{ old('power') ?? $card->power }}">
                <label for="effect">Card Effect</label>
                <textarea id="effect" name="effect" required>{{ old('effect') ?? $card->effect }}</textarea>
                <label for="card_set_id">Card Set</label>
                <select id="card_set_id" name="card_set_id" style="margin-bottom: 10px;">
                    @foreach ($cardsets as $cardset)
                        <option value="{{ $cardset['id'] }}" {{ old('card_set_id') ?? $card->card_set_id == $cardset['id'] ? 'selected' : '' }}>{{ $cardset['name'] }}</option>
                    @endforeach
                </select>
                <label for="effect_type_id">Effect Type</label>
                <select id="effect_type_id" name="effect_type_id" style="margin-bottom: 10px;">
                    @foreach ($effect_types as $effect_type)
                        <option value="{{ $effect_type['id'] }}" {{ old('effect_type_id') ?? $card->effect_type_id == $effect_type['id'] ? 'selected' : '' }}>{{ $effect_type['name'] }}</option>
                    @endforeach
                </select>
                <label for="species_id">Effect Type</label>
                <select id="species_id" name="species_id" style="margin-bottom: 10px;">
                    @foreach ($species as $specimin)
                        <option value="{{ $specimin['id'] }}" {{ old('species_id') ?? $card->species_id == $specimin['id'] ? 'selected' : '' }}>{{ $specimin['name'] }}</option>
                    @endforeach
                </select>
                <label for="number">Number in Set</label>
                <input type="number" id="number" name="number" required value="{{ old('number') ?? $card->number }}">

                <label for="elements[]">Elements</label>
                <div class="multi-select-checkboxes">
                    @foreach ($elements as $element)
                        <div><label><input type="checkbox" name="elements[]" value="{{ $element['id'] }}" {{ in_array($element['id'], $card_elements) ? 'checked' : '' }}> <span class="hover-to-select">{{ $element['name'] }}</span></label></div>
                    @endforeach
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="error">{{ $error }}</div>
                    @endforeach
                @endif
                <button type="submit" class="site-button">Save</button>
            </form>
            <form method="post" action="{{ route('admin.cards.destroy', ['card' => $card->id]) }}" onsubmit="return confirm('This will permanently delete this card. Are you sure?');">
                @method('delete')
                <button type="submit" class="site-button">Delete</button>
            </form>
        </div>
    </main>
</body>