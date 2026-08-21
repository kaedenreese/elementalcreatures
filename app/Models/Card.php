<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['name', 'card_set_id', 'power', 'level', 'effect', 'number', 'effect_type_id', 'species_id'])]
class Card extends Model
{
    public function elements(): BelongsToMany
    {
        return $this->belongsToMany(CardElement::class);
    }

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function cardset(): BelongsTo
    {
        return $this->belongsTo(CardSet::class);
    }

    public function effect_type(): BelongsTo
    {
        return $this->belongsTo(EffectType::class);
    }
}
