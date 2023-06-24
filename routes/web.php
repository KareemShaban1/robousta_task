<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TripCostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('backend.pages.dashboard.index');
// })->name('dashboard');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::resource('/buses',BusController::class);

Route::resource('/stations',StationController::class);

Route::resource('/trips',TripController::class);

Route::resource('/trip_cost',TripCostController::class);

Route::resource('/seats',SeatController::class);

Route::get('/show_seats/{trip_id}',[SeatController::class,'show_seats'])->name('seats.show_seats');

Route::put('/reserve_seat/{trip_id}',[SeatController::class,'reserve_seat'])->name('seats.reserve_seat');

Route::get('/get-trip-cost',[SeatController::class,'getTripCost']);




