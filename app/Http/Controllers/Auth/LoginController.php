<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('signin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if ($user->status === 'Unconfirmed') {
                return redirect()->route('confirmation_page');
            }

            // Laravel will automatically redirect to the intended URL or the home route
            // based on the user's authentication status, so no need for explicit redirection here
        }

        return redirect()->route('signin')->with('error', 'Invalid email or password');
    }



}
