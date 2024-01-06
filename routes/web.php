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
    Route::get('/attractions', "attractions");
    Route::get('/accomodations', "accomodations");
});

Route::group(["controller" => Controllers\VisitationController::class], function () {
    Route::post('/book-visitation', "bookVisitation");
    Route::post('/book-accomodation', "bookAccomodation");
    Route::post('/make-payment', "makePayment");
    Route::get('/sucessful-payment', "sucessfulPayment")->name("successful-payment");
});



Route::group(["controller" => Controllers\TouristController::class], function () {
    Route::post('/touristlogin', "login");

    Route::post('/touristregister', "register");
});

Route::group(["prefix" => "/admin"], function () {

    Route::group(["controller" => Controllers\AdminController::class], function () {
        Route::group([
            "prefix" => "login",
            "middleware" => "authenticated"
        ], function () {
            Route::get('/', "login")->name("admin.login");
            Route::post('/', "loginPost");
        });

        Route::group(["middleware" => "auth.admin"], function () {
            Route::get('/', "dashboard")->name("adminDashboard");
            Route::get('/administrators', "administrators");
            Route::post('/add-administrators', "addAdministrators");
            Route::get('/settings', "settings");
            Route::get('/profile', "profile");
            Route::get('/edit-administrators-content', "editAdministratorsContent");
            Route::group(["prefix" => "payment"], function () {
                Route::get('/view-payment', "viewPayment")->name("payment.view");
                Route::get('/get-payment-info', "getpaymentInfo");
            });
        });
        Route::get('/logout', "logout");
    });


    Route::group(["middleware" => "auth.admin"], function () {
        Route::group(["prefix" => "manage"], function () {
            Route::group([
                "controller" => Controllers\AttractionsController::class
            ], function () {
                Route::get('/attractions', "manageAttractions")->name("manage.attractions");
                Route::post('/add-attractions', "addAttractions");
                Route::get('/edit-attractions-content', "editAttractionsContent");
            });

            Route::group([
                "controller" => Controllers\AccomodationsController::class
            ], function () {
                Route::get('/accomodations', "manageAccomodations")->name("manage.accomodations");
                Route::post('/add-accomodations', "addAccomodations");
                Route::get('/edit-accomodations-content', "editAccomodationsContent");
            });
        });
    });
})->name("admin");
