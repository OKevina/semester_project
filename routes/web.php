<?php

use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/register', 'RegistrationController@register');

Route::get('/signin', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('signin');
Route::post('/signin', 'App\Http\Controllers\Auth\LoginController@login')->name('signin.process');

// Route to display the signup form
Route::get('/signup', [RegistrationController::class, 'showSignUpForm'])->name('signup');

// Route to process the signup form
Route::post('/signup', [RegistrationController::class, 'register'])->name('signup.process');
Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

Route::get('/confirmation_page', function () {
    return view('confirmation');
});

Route::get('/confirmation/{token}', 'App\Http\Controllers\ConfirmationController@confirm')->name('confirmation');

