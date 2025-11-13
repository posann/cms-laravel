<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskFunctions extends Model
{
    use HasFactory;

    protected $table = 'task_functions';

    protected $fillable = [
        'institution_name',
        'intro',
        'tugas',
        'fungsi',
        'ruang_lingkup',
        'order_column',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order_column' => 'integer',
    ];
}