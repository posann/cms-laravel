<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Minister extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'order_number',
        'start_period',
        'end_period',
        'photo_path',
        'description',
        'is_featured',
    ];

    protected $appends = [
        'photo_url',
    ];

    protected $casts = [
        'start_period' => 'date',
        'end_period' => 'date',
        'is_featured' => 'boolean',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->photo_path ? Storage::url($this->photo_path) : null;
    }
}
