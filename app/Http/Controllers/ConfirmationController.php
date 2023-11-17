<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmationController extends Controller
{
    public function confirm(Request $request)
{
    $token = $request->route('token');

    if ($token) {
        try {
            $user = DB::table('users')
                ->where('ConfirmationToken', $token)
                ->first();

            if ($user) {
                DB::table('users')
                    ->where('ConfirmationToken', $token)
                    ->update([
                        'status' => 'confirmed',
                        'ConfirmationToken' => Null,
                    ]);

                return "Account confirmed successfully!";
            } else {
                return "Invalid confirmation token.";
            }
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
    return "No confirmation token provided.";
}

}
