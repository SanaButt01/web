<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware("guest")->except("logout");
    }

    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|string|min:8",
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }

        
        if (Auth::attempt($request->only("email", "password"))) {
            $user = Auth::user();
            $rememberToken = Str::random(64);
            $user->remember_token = $rememberToken;
            $user->save();

           

            return response()->json(
                [
                    "user" => $user,
                    "remember_token" => $rememberToken,
                    "message" => "Login successful",
                ],
                200
            );
        }

        return response()->json(["message" => "Invalid credentials"], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

    

        return response()->json(["message" => "Logout successful"], 200);
    }
}
