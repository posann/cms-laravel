<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Official extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'position_type',
        'start_period',
        'end_period',
        'photo_path',
        'description',
        'sort_order',
    ];

    protected $appends = [
        'photo_url',
    ];

    protected $casts = [
        'start_period' => 'date',
        'end_period' => 'date',
        'sort_order' => 'integer',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo_path ? Storage::url($this->photo_path) : null;
    }
}
