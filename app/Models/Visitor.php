<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_visited'
    ];

    public static function getTotalVisitors()
    {
        return static::distinct('ip_address')->count();
    }

    public static function getTodayVisitors()
    {
        return static::whereDate('created_at', today())->distinct('ip_address')->count();
    }

    public static function getOnlineVisitors()
    {
        $fifteenMinutesAgo = now()->subMinutes(15);
        return static::where('created_at', '>=', $fifteenMinutesAgo)->distinct('ip_address')->count();
    }
}