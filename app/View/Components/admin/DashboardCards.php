<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
        $this->contents = [
            [
                "title" => "Registered Users",
                "icon" => "far fa-user",
                "count" => 3400
            ], [
                "title" => "Attractions",
                "icon" => "far fa-map",
                "count" => 30000
            ], [
                "title" => "Visitations",
                "icon" => "fas fa-bullseye",
                "count" => 8000
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
