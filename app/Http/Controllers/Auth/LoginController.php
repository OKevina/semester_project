<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use AuthenticatesUsers {
        sendFailedLoginResponse as traitSendFailedLoginResponse;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected $username;


    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // If the user with the provided email exists, but the password is incorrect
            if (Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    $this->username() => [trans('auth.password_incorrect')],
                ]);
            }
        }

        // If the user with the provided email does not exist
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.user_not_found')],
        ]);
    }




}






