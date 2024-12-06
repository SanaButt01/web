<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
   
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin.dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function showloginform()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
    
        $admin = Admin::where('email', $request->email)->first();
    
        if (!$admin) {
          
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'The provided email is incorrect.', 
                ]);
        } else {
            
            if (!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors([
                        'password' => 'The provided password is incorrect.',  
                    ]);
            }
    
            // Successful login
            return redirect()->route('admin.dashboard');
        }
    }
    
    
  

    public function logout(Request $request)
    {
        auth('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}