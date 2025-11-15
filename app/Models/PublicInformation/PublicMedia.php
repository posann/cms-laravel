<?php

namespace App\Models\PublicInformation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PublicMedia extends Model
{
    use HasFactory;

    protected $table = 'public_media';

    protected $fillable = [
        'type',
        'title',
        'slug',
        'content_overview',
        'content_raw',
        'status',
        'tags',
        'description',
        'published_at',
        'image_path',
        'video_url',
        'video_file_path',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (PublicMedia $model) {
            if (empty($model->slug) && !empty($model->title)) {
                $base = Str::slug($model->title);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $model->slug = $slug;
            }
        });

        static::updating(function (PublicMedia $model) {
            if ($model->isDirty('title') && empty($model->slug)) {
                $base = Str::slug($model->title);
                $slug = $base;
                $i = 1;
                while (static::where('slug', $slug)->where('id', '!=', $model->id)->exists()) {
                    $slug = $base.'-'.$i++;
                }
                $model->slug = $slug;
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image_path)) {
            return null;
        }
        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}