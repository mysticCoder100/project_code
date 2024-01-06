<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models;

class DashboardCards extends Component
{
    /**
     * Create a new component instance.
     */

    public array $contents;

    public function __construct()
    {
        $this->setCardContent();
    }

    public function setCardContent()
    {

        $touristCount = Models\Tourist::count();
        $attractionsCount = Models\Attraction::count();
        $visitationsCount = Models\Visitation::count();

        $this->contents = [
            [
                "title" => "Registered Users",
                "icon" => "far fa-user",
                "count" => $touristCount
            ], [
                "title" => "Attractions",
                "icon" => "far fa-map",
                "count" => $attractionsCount
            ], [
                "title" => "Visitations",
                "icon" => "fas fa-bullseye",
                "count" => $visitationsCount
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.dashboard-cards');
    }
}
