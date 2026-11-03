<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'website', 'address', 'priority', 'phone_number', 'shipping'])]

class Retailer extends Model
{
    //
}
