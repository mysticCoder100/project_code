<?php

namespace App\View\Components\landing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Accomodation;

class AccomodationsWrapper extends Component
{
    public object $accomodations;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->accomodations = Accomodation::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.accomodations-wrapper');
    }
}
