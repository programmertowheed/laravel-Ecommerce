<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Notifications\VerifyRegistration;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\Division;
use App\District;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @override
     * ShowRegistrationFrom
     * Display the Registration Form
     */
    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('priority','asc')->get();
        $districts = District::orderBy('name','asc')->get();

        return view('auth.register', compact('districts', 'divisions'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        return Validator::make($data, [
//            'first_name' => ['required', 'string', 'max:30'],
//            'last_name' => ['max:15'],
//            'username' => ['required','unique:users', 'string', 'max:20'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'phone_no' => ['required', 'unique:users', 'max:15'],
//            'street_address' => ['required', 'max:100'],
//            'division_id' => ['required', 'numeric'],
//            'district_id' => ['required', 'numeric'],
//        ],[
//            'division_id.required' => 'Please select Division',
//            'district_id.required'  => 'Please select District',
//        ]);
    }


    /**
     * @Custom validation
     */
    public function customvalidation(Request $request){
        $this->validate($request,[
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['max:15'],
            'username' => ['required','unique:users', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no' => ['required', 'unique:users', 'max:15'],
            'street_address' => ['required', 'max:100'],
            'division_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
        ],[
            'division_id.required' => 'Please select Division',
            'district_id.required'  => 'Please select District',
        ]);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {

        $user = $this->customvalidation($request);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'phone_no' => $request->phone_no,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'street_address' => $request->street_address,
            'ip_address' => request()->ip(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->status = 0;
        $user->remember_token = str_random(50);
        $user->save();

        $user->notify(new VerifyRegistration($user));
        session()->flash('success', 'A confirmation email has sent to you. Please check email and active your account');
        return redirect()->route("admin.login");


    }
}
