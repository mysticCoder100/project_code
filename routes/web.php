<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(["controller" => Controllers\LandingController::class], function () {
    Route::get('/', "index");
    Route::get('/about', "about");
    Route::get('/contact', "contact");
    Route::get('/payment', "payment");
});


Route::group(["prefix" => "/admin"], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::group(["prefix" => "manage"], function () {
        Route::get('/attractions', function () {
            // return "Manage Park Attractions";
            return view('admin.dashboard');
        })->name("manage.attractions");
    });
});
