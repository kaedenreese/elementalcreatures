<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['name', 'cardset_id', 'power', 'effect', 'number', 'effect_type', 'species_id'])]
class Card extends Model
{
    public function elements(): BelongsToMany
    {
        return $this->belongsToMany(CardElement::class);
    }

    public function species(): HasOne
    {
        return $this->hasOne(Species::class);
    }
}
