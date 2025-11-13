<?php

namespace App\Models\Permit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermitDocument extends Model
{
    use HasFactory;

    protected $table = 'permit_documents';

    protected $fillable = [
        'permit_category_id',
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
        return $this->belongsTo(PermitCategory::class, 'permit_category_id');
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