<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('signin');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $remember = $request->has('remember'); // Check if "Remember Me" is selected

    if (Auth::attempt($credentials, $remember)) {
        $user = Auth::user();

        if ($user->status === 'Unconfirmed') {
            return redirect()->route('confirmation_page');
        } else if ($user->status === 'confirmed') {
            return redirect()->route('home');
        }
    }

    return redirect()->route('signin')->with('error', 'Invalid email or password');
}


}
