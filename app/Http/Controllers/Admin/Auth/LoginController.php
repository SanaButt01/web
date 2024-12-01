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
            // If email is incorrect
            return redirect()->back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'The provided email is incorrect.',  // Error for incorrect email
                ]);
        } else {
            // If email exists but password is incorrect
            if (!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors([
                        'password' => 'The provided password is incorrect.',  // Error for incorrect password
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