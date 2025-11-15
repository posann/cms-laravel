<?php

namespace App\Models\Price;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'price';

    protected $fillable = [
        'price_menu_id',
        'sub_name_id',
        'name',
        'date_period',
        'price',
    ];

    public $timestamps = true;


    protected $hidden = [
        'created_at',
        'updated_at',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo(PriceMenu::class, 'price_menu_id');
    }

    public function subMenu()
    {
        return $this->belongsTo(PriceSubMenu::class, 'sub_name_id');
    }
    
}
