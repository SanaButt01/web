<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    use RegistersUsers;

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
            'icon' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adjust max file size as needed
        ]);
    }

    protected function create(array $data)
    {
        $iconPath = null;
        
        if (isset($data['icon'])) {
            // Upload and store the image
            $iconPath = $data['icon']->storeAs('public/profiles', $data['name'] . '_' . time() . '.' . $data['icon']->getClientOriginalExtension());
            $iconPath = str_replace('public/', '', $iconPath); // Remove 'public/' from path for storage
        }
    
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'icon' => $iconPath, // Store the image path in 'icon' column
        ]);
    }

    public function register(Request $request)
{
    $validator = $this->validator($request->all());

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = $this->create($request->all());

    // Send the email
    Mail::raw('Welcome to our platform, ' . $user->name . '!', function ($message) use ($user) {
        $message->to($user->email)
                ->subject('Welcome to Our Platform');
    });

    return response()->json(['user' => $user], 201);
}

}
