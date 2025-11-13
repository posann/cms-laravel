<?php

namespace App\View\Components\Public;

use App\Models\Visitor;
use Illuminate\View\Component;

class VisitorCounter extends Component
{
    public function render()
    {
        return view('components.public.visitor-counter', [
            'totalVisitors' => Visitor::getTotalVisitors(),
            'todayVisitors' => Visitor::getTodayVisitors(),
            'onlineVisitors' => Visitor::getOnlineVisitors(),
        ]);
    }
}