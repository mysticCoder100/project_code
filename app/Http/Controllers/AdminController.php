<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Custom\Form;
use App\Http\Requests;
use App\Models\Administrator;
use App\Models\Visitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function login()
    {
        $fields = (new Custom\UserForm)->loginFields();
        return view('admin.admin-login')->with(["fields" => $fields]);
    }
    public function loginPost(Requests\LoginFormRequest $request)
    {
        $validatedData = $request->validated();

        if (Auth::guard("administrator")->attempt($validatedData)) {
            $request->session()->regenerate();
            $user = Auth::guard('administrator')->user();
            return redirect()->route('adminDashboard');
        }
        return back()->withErrors(["invalid" => "Invalid Login Credentials"]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function viewPayment()
    {
        return view("admin.view_payment");
    }

    public function getpaymentInfo(Request $request)
    {
        $visitationId = $request->input("id");
        $visitationDetail = Visitation::find($visitationId);
        $tourist_id = $visitationDetail->tourist_id;

        if ($tourist_id) {
            $visitationDetail = Visitation::from("visitations as v")
                ->join("tourists as t", "v.tourist_id", "=", "t.tourist_id")
                ->select("v.*", "t.name", "t.email")
                ->where("v.visitation_id", $visitationId)->get()[0];
        }

        return $visitationDetail;
    }

    public function administrators()
    {
        $fields = (new Custom\Form())->administratorsFields();
        return view("admin.administrators", ["fields" => $fields]);
    }

    public function addAdministrators(Requests\AdministratorRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData["password"] = Hash::make(12345678);

        $query = Administrator::create($validatedData);

        return response()->json([
            "message" => "Administrators Sucessfully Saved",
        ], 200);
    }

    public function editAdministratorsContent(Request $request)
    {
        $data = $data = Administrator::find($request->input("id"));

        return $data;
    }

    public function settings()
    {
        $accountFields = array_filter(
            (new  Form())->administratorsFields(),
            fn ($field) => $field["name"] != "role",
        );

        $passwordResetFields = (new Form)->passwordReset();

        return view("admin.settings", [
            "accountFields" => $accountFields,
            "passwordResetFields" => $passwordResetFields
        ]);
    }

    public function profile()
    {
        return view("admin.profile");
    }
}
