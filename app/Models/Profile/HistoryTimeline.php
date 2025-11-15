<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryTimeline extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'year',
        'description',
    ];
}
