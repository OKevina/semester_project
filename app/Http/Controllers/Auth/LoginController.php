<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers {
        sendFailedLoginResponse as traitSendFailedLoginResponse;
        showLoginForm as traitShowLoginForm;
    }

    protected $redirectTo = RouteServiceProvider::HOME;
    protected $username = 'email';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        \Illuminate\Support\Facades\Log::info('Login attempt failed', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => [trans('auth.failed')],
            ]);
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        // Add a check for user status
        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->Status == 'confirmed') {
            return $this->guard()->attempt(
                $credentials, $request->filled('remember')
            );
        }

        return false;
    }


    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('admin.edit.page');
        }

        return redirect()->intended($this->redirectPath());
    }


    // Override the trait's method to show your custom login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
