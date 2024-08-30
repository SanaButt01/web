<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::latest()->get();

        return view("admin.user.index", compact("users"));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            "remember_token" => "required|string|size:64",
            "name" => "sometimes|string|max:255",
            "icon" => "sometimes|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $user = User::where(
            "remember_token",
            $request->remember_token
        )->first();

        if (!$user) {
            return response()->json(["message" => "User not found"], 404);
        }

        if ($request->has("name")) {
            $user->name = $request->name;
        }

        if ($request->hasFile("icon")) {
            // Delete old icon if exists
            if ($user->icon) {
                Storage::delete("public/icons/" . $user->icon);
            }

            $iconName = time() . "." . $request->icon->extension();
            $request->icon->storeAs("public/icons", $iconName);
            $user->icon = $iconName;
        }

        $user->save();

        return response()->json(
            [
                "message" => "Profile updated successfully",
                "user" => $user,
            ],
            200
        );
    }
}
