<?php

namespace App\Models\Permit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ServiceStandard extends Model
{
    use HasFactory;

    protected $table = 'service_standard';

    protected $fillable = [
        'title',
        'description',
        'pdf_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function getPdfUrlAttribute(): ?string
    {
        if (! $this->pdf_path) {
            return null;
        }

        if (Storage::disk('public')->exists($this->pdf_path)) {
            return Storage::disk('public')->url($this->pdf_path);
        }

        if (Storage::exists($this->pdf_path)) {
            return Storage::url($this->pdf_path);
        }

        return null;
    }
}