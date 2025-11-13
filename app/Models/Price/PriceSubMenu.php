<?php

namespace App\Models\Price;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceSubMenu extends Model
{
    use HasFactory;

    protected $table = 'price_sub_menu';

    protected $fillable = [
        'sub_name',
        'status',
        'price_menu_id',
    ];

    public $timestamps = true;


    public function menu()
    {
        return $this->belongsTo(PriceMenu::class, 'price_menu_id');
    }

    public function prices()
    {
        return $this->hasMany(Price::class, 'sub_name_id');
    }
}
