<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['email', 'name', 'message', 'read'])]

class ContactUs extends Model
{
    //
}
