<?php

namespace App\View\Components;

use Closure;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class FrontLayout extends Component
{
    public $theme;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        if (Auth::check() && Auth::user()->setting) {
            $this->theme = Auth::user()->setting->theme_name;
        } else {
            $this->theme = 'light';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.front-layout');
    }
}
