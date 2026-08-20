<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'address', 'date', 'priority', 'online', 'recurring'])]

class Event extends Model
{
    //
}
