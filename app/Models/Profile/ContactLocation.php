<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactLocation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'institution_name',
        'map_embed',
        'phone',
        'fax',
        'email',
    ];
}