<?php

namespace App\Models\PublicInformation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceDocument extends Model
{
    use HasFactory;

    protected $table = 'performance_documents';

    protected $fillable = [
        'performance_category_id',
        'title',
        'description',
        'published_at',
        'download_count',
        'file_path',
        'external_url',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'download_count' => 'integer',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(PerformanceCategory::class, 'performance_category_id');
    }

    public function getDownloadUrlAttribute(): ?string
    {
        if (!empty($this->external_url)) {
            return $this->external_url;
        }
        if (!empty($this->file_path)) {
            return asset('storage/' . ltrim($this->file_path, '/'));
        }
        return null;
    }
}