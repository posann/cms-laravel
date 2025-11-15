<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    protected $fillable = [
        'vision',
        'mission',
    ];

    protected $casts = [
        'vision' => 'string',
        'mission' => 'string',
    ];
}
