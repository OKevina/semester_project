<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;

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
Route::group(['middleware' => 'web'], function () {
    // Your authentication routes here
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register.form');

Route::get('/signin', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/signin', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

// Route to display the signup form
//Route::get('/signup', [RegistrationController::class, 'showSignUpForm'])->name('signup');

// Route to process the signup form
Route::post('/logout', 'App\Http\Controllers\Auth\LogoutController@logout')->name('logout');

Route::get('/confirmation_page', function () {
    return view('confirmation');
});

Route::get('/confirmation/{token}', 'App\Http\Controllers\ConfirmationController@confirm')->name('confirmation');



Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');


// Add routes for updating, deleting, and managing hotel images in HotelController
Route::post('/hotel/update', [HotelController::class, 'update'])->name('hotel.update');
Route::post('/hotel/delete', [HotelController::class, 'delete'])->name('hotel.delete');
Route::post('/hotel/update-image', [HotelController::class, 'updateImage'])->name('hotel.updateImage');
Route::post('/hotel/delete-image', [HotelController::class, 'deleteImage'])->name('hotel.deleteImage');


Route::middleware(['auth'])->group(function () {
    Route::get('/book-trip', [BookingController::class, 'userBookings'])->name('user.bookings');

    Route::post('/book-trip', [BookingController::class, 'bookTrip'])->name('book.trip');
    Route::delete('/cancel-trip/{bookingId}', [BookingController::class, 'cancelTrip'])->name('cancel.trip');
});

// Admin-related routes
Route::group(['middleware' => 'admin'], function ()  {
    Route::get('/admin/bookings', [BookingController::class, 'allBookings'])->name('admin.bookings');
});

