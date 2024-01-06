<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Attraction;
use App\Custom;

class AttractionsController extends Controller
{
    public function manageAttractions()
    {
        $fields = (new Custom\Form())->attractions();
        return view('admin.attractions_admin', ["fields" => $fields]);
    }

    public function addAttractions(Requests\AttractionRequest $request)
    {
        $validatedData = $request->validated();

        $image = $request->file('attraction_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $upload = $image->move(public_path('assets/images/attractions'), $filename);
        if ($upload) {
            $validatedData["attraction_image"] = $filename;
            Attraction::create($validatedData);

            return response()->json([
                "message" => "Details Sucessfully Uploaded",
            ], 200);
        } else {
            return response()->json([
                "message" => "Invalid Details",
                "errors" => [
                    "email" => "Invalid Login Credentials"
                ]
            ], 422);
        }
    }

    public function editAttractionsContent(Request $request)
    {
        $data = $data = Attraction::find($request->input("id"));
        return $data;
    }
}
