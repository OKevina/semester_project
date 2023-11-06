<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $userStatus = $user->status;

            if ($userStatus === 'Unconfirmed') {
                return redirect('confirmation_page');
            } else if ($userStatus === 'confirmed') {
                return redirect()->route('home');

            } else {
                return redirect('confirmation_page');
            }
        } else {
            return redirect('signin')->with('error', 'Invalid email or password');
        }
    }
    /**
     * Summary of showSignInForm
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showSignInForm()
{
    return view('signin');
}

}

