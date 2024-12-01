<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Books;
use Illuminate\Support\Facades\Log; // Add this at the top if not already imported

use App\Models\Category;
class AdminController extends Controller
{

    
   
  
    public function profile()
{
    $admin = Admin::find(auth()->user()->id);
    return view('admin.index', compact('admin'));
}
public function dashboard()
{
    if (!auth()->check()) {
        return redirect()->route('admin.login');
    }

    return view('admin.dashboard', [
        'admin' => Admin::find(auth()->user()->id)
    ]);
}



    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

   
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => [
                'required', // Password is mandatory
                'string',
                'min:8',
                'max:8',
                'regex:/^[^\s]{8,8}$/', // Disallow only spaces, no spaces at start or end
            ],
     // Allow password to be nullable but must have a minimum length if provided
        ]);
    
        // Find the admin record
        $admin = Admin::find($id);
    
        if (!$admin) {
            Log::error("Admin not found with ID: $id"); // Log the error
            return redirect()->back()->with('error', 'Admin not found.');
        }
    
        // Update the admin details
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
    
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password'));
        }
    
        // Save the changes
        $result = $admin->save();
    
        // Log the result
        if ($result) {
          
            return redirect(route('admin.dashboard'))->with('success', 'Data has been updated successfully.');
        } else {
          
            return redirect(route('admin.dashboard'))->with('error', 'Data has not been updated.');
        }
    }
    
    }
   

     