<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description', 'release_date', 'public'])]

class CardSet extends Model
{
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
