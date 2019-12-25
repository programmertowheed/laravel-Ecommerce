<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Admin;


class AdminLoginController extends Controller
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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ],[
            'email.required' => 'Email field must not be empty',
            'password.required' => 'Password field must not be empty',
        ]);

        //Find User by this email
        $admin = Admin::where('email', $request->email)->first();

        if($admin) {

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->intended(route('admin.deshboard'));
            } else {
                session()->flash('error', 'These credentials do not match our records.');
                return back();
            }
        }else{
            session()->flash('error', 'You are not Authorized');
            return back();
        }

    }


    public function logout(Request $request)
    {
        Auth::guard("admin")->logout();
        return redirect()->route('admin.login');
    }



}
