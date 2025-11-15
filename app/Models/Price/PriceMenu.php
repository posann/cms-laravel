<?php

namespace App\Models\Price;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceMenu extends Model
{
    use HasFactory;

    protected $table = 'price_menu';

    protected $fillable = [
        'name',
        'sub_name_id',
        'status',
    ];

    public $timestamps = true;


    public function subMenu()
    {
        return $this->belongsTo(PriceSubMenu::class, 'sub_name_id');
    }

    public function prices()
    {
        return $this->hasMany(Price::class, 'pi');
    }
}
