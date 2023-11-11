<?php

namespace App\View\Components\landing;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Custom\UserForm;

class landingHeader extends Component
{

    public array $loginFields, $registerFields;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->loginFields = (new UserForm())->loginFields();
        $this->registerFields = (new UserForm())->registerFields();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.landing.landingHeader');
    }
}
