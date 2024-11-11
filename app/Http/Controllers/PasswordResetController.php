<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    public function sendResetCode(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        // Generate six-digit code and authentication token
        $code = rand(100000, 999999);
        $authToken = Str::random(64);
    
        // Save to password_resets table
        PasswordReset::updateOrCreate(
            ['email' => $request->email],
            ['token' => $code, 'auth_token' => $authToken, 'created_at' => Carbon::now()]
        );
    
        // Send email
        Mail::raw("Your password reset code is: $code", function($message) use ($request) {
            $message->to($request->email)
                    ->subject('Password Reset Code | BooksCity');
        });
    
        return response()->json(['message' => 'Reset code sent to your email.'], 200);
    }
    
    public function verifyResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required'
        ]);
    
        $passwordReset = PasswordReset::where('email', $request->email)
                        ->where('token', $request->code)
                        ->first();
    
        if (!$passwordReset) {
            return response()->json(['message' => 'Invalid code.'], 400);
        }
    
        if (Carbon::parse($passwordReset->created_at)->addMinutes(15)->isPast()) {
            return response()->json(['message' => 'Code has expired.'], 400);
        }
    
        return response()->json(['auth_token' => $passwordReset->auth_token, 'message' => 'Code is valid.'], 200);
    }
    
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'auth_token' => 'required',
            'password' => 'required|confirmed'
        ]);
    
        // Verify the auth token
        $passwordReset = PasswordReset::where('email', $request->email)
                                      ->where('auth_token', $request->auth_token)
                                      ->first();
    
        if (!$passwordReset) {
            return response()->json(['message' => 'Invalid reset request.'], 400);
        }
    
        // Check if the code has expired
        if (Carbon::parse($passwordReset->created_at)->addMinutes(15)->isPast()) {
            return response()->json(['message' => 'Token has expired.'], 400);
        }
    
        // Update password
        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Delete the reset entry after successful reset
        $passwordReset->delete();

        Mail::raw("Your BooksCity Password has been reset. If you didn't do this, contact administration.", function($message) use ($request) {
            $message->to($request->email)
                    ->subject('Password Reset | BooksCity');
        });
    
        return response()->json(['message' => 'Password has been successfully reset.'], 200);
    }
    
}
