<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::resource('room', RoomController::class)->scoped(['room' => 'slug'])->only('index', 'show');

Route::resource('reservation', ReservationController::class)->only('store', 'show');

Route::get('reservation/confirm/{id}/{hash}', [ReservationController::class, 'confirm'])->name('reservation.confirm');

Route::controller(ReservationController::class)->middleware('auth')->group(function () {
    Route::get('/reservation', 'index')->name('home');
    Route::post('/reservation/details', 'getReservationDetails')->name('reservation.details');
});

Route::get('/contact', function () {
    return view('pages.contact');
});
