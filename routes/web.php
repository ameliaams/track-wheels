<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

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

Auth::routes();

// Route::group(['prefix' => '/admin'], function () {
//     Route::get('/', [HomeController::class, 'index'])->name('admin')->middleware('admin');
// });

// Route::group(['prefix' => '/user'], function () {
//     Route::get('/', [HomeController::class, 'index'])->name('user')->middleware('user');
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');
Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('admin.booking');
Route::post('/submit', [App\Http\Controllers\BookingController::class, 'store'])->name('submit');
Route::get('/booklist', [App\Http\Controllers\BookingController::class, 'show'])->name('admin.booklist');
Route::get('/vehicles', [App\Http\Controllers\VehiclesController::class, 'index'])->name('admin.vehicles');
Route::get('/drivers', [App\Http\Controllers\DriversController::class, 'index'])->name('admin.drivers');

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user.index');
Route::get('/request', [App\Http\Controllers\BookreqController::class, 'index'])->name('user.request');
    // Route::get('/booklist', [App\Http\Controllers\BooklistController::class, 'index'])->name('admin.booklist');
    // Route::get('/vehicles', [App\Http\Controllers\VehiclesController::class, 'index'])->name('admin.vehicles');
