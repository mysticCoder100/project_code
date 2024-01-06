<?php

namespace App\View\Components\admin;

use App\Models\Accomodation;
use App\Models\Administrator;
use App\Models\Attraction;
use App\Models\Visitation;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminAttractions extends Component
{
    public string $listName;
    public object $contents;
    public array $headers;
    public array $fields;
    /**
     * Create a new component instance.
     */
    public function __construct(string $listName, array $fields = [])
    {
        $this->listName = $listName;
        $this->fields = $fields;
        $splitName = explode(" ", $listName);

        $joinWords = function ($array) {
            $joinedWords = "";
            foreach ($array as $key => $item) {
                if ($key == 0) {
                    $joinedWords .= $item;
                    continue;
                }
                $joinedWords .= ucfirst($item);
            }
            return $joinedWords;
        };
        $listName = $joinWords($splitName);
        $this->$listName();
    }

    public function attractions(): void
    {
        (array) $this->headers = [
            "Name",
            "Description",
            "Action"
        ];

        (object) $this->contents = Attraction::all();
    }

    public function viewPayments()
    {
        (array) $this->headers = [
            "Name",
            "Email",
            "Amount",
            "Payment Status",
            "Action"
        ];

        $withoutTouristId = Visitation::whereNull('tourist_id')->get();

        $withTouristId = Visitation::from('visitations as v')
            ->Join('tourists as t', 'v.tourist_id', '=', 't.tourist_id')
            ->select('v.*', 't.name', 't.email')
            ->get();

        $contents =  $withoutTouristId->merge($withTouristId)->sortBy('created_at');

        $this->contents = $contents;
    }

    public function accomodations(): void
    {
        (array) $this->headers = [
            "Name",
            "Price",
            "Description",
            "Action"
        ];

        (object) $this->contents = Accomodation::all();
    }

    public function administrators(): void
    {
        (array) $this->headers = [
            "First Name",
            "Last Name",
            "Email",
            "Role",
            "Action"
        ];

        $currentUser = Auth::guard("administrator")->user()->administrator_id;

        (object) $this->contents = Administrator::where("administrator_id", "!=", 1)
            ->where("administrator_id", "!=", $currentUser)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.admin-attractions');
    }
}
