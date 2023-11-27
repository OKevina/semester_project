<?php

// app/Http/Controllers/Auth/RegisterController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user', // Set the default role here
        ]);

        // Generate and store confirmation token
        $confirmationToken = bin2hex(random_bytes(16));
        $user->confirmationToken = $confirmationToken;
        $user->save();

        // Send confirmation email
        Mail::to($user->email)->send(new ConfirmationMail($confirmationToken));

        return $user;
    }

    // Override the trait's method to show your custom registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Override the trait's method to handle the registration confirmation
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();

        return redirect()->route('login')->with('confirmation', 'A confirmation email has been sent. Please check your email to complete the registration.');
    }
}
