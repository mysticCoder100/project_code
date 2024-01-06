<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TouristController extends Controller
{
    public function register(Requests\RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData["password"] = Hash::make($validatedData["password"]);
        $validatedData = array_filter(
            $validatedData,
            fn ($data) => $data !== "confirm_password",
            ARRAY_FILTER_USE_KEY
        );
        $tourist = Tourist::create($validatedData);

        return response()->json([
            'message' => 'Registration successful!',
        ], 200);
    }

    public function login(Requests\LoginFormRequest $request)
    {
        $validatedData = $request->validated();

        $auth = Auth::guard("tourist")->attempt($validatedData);
        if ($auth) {
            $request->session()->regenerate();
            $user = Auth::guard('tourist')->user();

            return response()->json([
                "message" => "Login Successfull",
            ], 200);
        }

        return response()->json([
            "message" => "Invalid Details",
            "errors" => [
                "email" => "Invalid Login Credentials"
            ]
        ], 422);
    }
}
