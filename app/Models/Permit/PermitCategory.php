<?php

namespace App\Models\Permit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PermitCategory extends Model
{
    use HasFactory;

    protected $table = 'permit_categories';

    protected $fillable = [
        'name',
        'description',
        'order_column',
        'is_active',
    ];

    protected $casts = [
        'order_column' => 'integer',
        'is_active' => 'boolean',
    ];

    public function documents()
    {
        return $this->hasMany(PermitDocument::class, 'permit_category_id');
    }
}