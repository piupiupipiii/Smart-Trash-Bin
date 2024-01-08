<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Routing\Router;
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


Route::get('/search-hotels', [HotelController::class, 'searchHotels'])->name('search.hotels');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/hotel/{id}', [HotelController::class, 'index'])->name('hotel');

Route::group(['middleware' => 'guest'], function (Router $route) {
    $route->group(['prefix' => '/login', 'as' => 'login.'], function (Router $route) {
        $route->get('/', [LoginController::class, 'index'])->name('index');
        $route->post('/', [LoginController::class, 'authenticate'])->name('authenticate');
    });

    $route->group(['prefix' => '/register', 'as' => 'register.'], function (Router $route) {
        $route->get('/', [RegisterController::class, 'create'])->name('create');
        $route->post('/', [RegisterController::class, 'store'])->name('store');
    });
});

Route::group(['middleware' => 'auth'], function (Router $route) {
    $route->group(['prefix' => '/logout', 'as' => 'logout.'], function (Router $route) {
        $route->get('/', [LogoutController::class, 'destroy'])->name('destroy');
    });

    $route->group(['prefix' => '/profile', 'as' => 'profile.'], function (Router $route) {
        $route->get('/', [ProfileController::class, 'index'])->name('index');
    });

    $route->group(['prefix' => '/booking', 'as' => 'booking.'], function (Router $route) {
        $route->post('/', [BookingController::class, 'store'])->name('store');
        $route->get('/create', [BookingController::class, 'create'])->name('create');
        $route->get('/detail/{id}', [BookingController::class, 'detail'])->name('detail');
        $route->patch('/cancel', [BookingController::class, 'cancel'])->name('cancel');
    });
});
