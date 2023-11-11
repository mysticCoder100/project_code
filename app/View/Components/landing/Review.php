<?php

namespace App\View\Components\landing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Review extends Component
{
    public array $reviews;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->reviews = [
            "student" => "Akanji",
            "student2" => "Akanji",
            "student3" => "Akanji",
            "student4" => "Akanji"
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.review');
    }
}