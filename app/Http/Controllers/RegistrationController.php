<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;
use App\Models\User;

class RegistrationController extends Controller
{
    public function showSignUpForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->role = $request->input('role'); // Assign the user's role

        $user->save();

        // Generate and store confirmation token
        $ConfirmationToken = bin2hex(random_bytes(16));
        $user->ConfirmationToken = $ConfirmationToken;
        $user->save();

        // Send confirmation email
        Mail::to($user->email)->send(new ConfirmationMail($ConfirmationToken));

        return view('confirmation');
    }
}

