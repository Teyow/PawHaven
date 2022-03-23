<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contactNo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'pass' => ['required', 'string', 'min:8'],
            'cpass' => 'required | min:8 | same:pass',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['fname'],
            'last_name' => $data['lname'],
            'address' => $data['address'],
            'contact_no' => $data['contactNo'],
            'email' => $data['email'],
            'password' => Hash::make($data['pass']),
            'is_admin' => false,
            'profile_pic' => NULL,
        ]);

        if (request()->hasFile('file')) {
            $file = request()->file('file')->getClientOriginalName();
            request()->file('file')->storeAs('profile_pics', $user->id . '/' . $file, ''); //does not save yet on the folder but saves on DB, sweet alert does not detect file even it has
            $user->update(['profile_pic' => $file]);
        } else {
            $user->update(['profile_pic' => 'no_image.jpg']);
        }

        return $user;
    }
}
