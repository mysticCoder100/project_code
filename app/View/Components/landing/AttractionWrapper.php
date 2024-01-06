<?php

namespace App\View\Components\landing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Attraction;

class AttractionWrapper extends Component
{

    public object $attractions;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->attractions = Attraction::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.attraction-wrapper');
    }
}
