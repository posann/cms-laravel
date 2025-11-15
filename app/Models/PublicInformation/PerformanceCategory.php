<?php

namespace App\Models\PublicInformation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceCategory extends Model
{
    use HasFactory;

    protected $table = 'performance_categories';

    protected $fillable = [
        'name',
        'order_column',
        'is_active',
    ];

    protected $casts = [
        'order_column' => 'integer',
        'is_active' => 'boolean',
    ];

    public function documents()
    {
        return $this->hasMany(PerformanceDocument::class, 'performance_category_id');
    }
}