<?php

namespace App\Http\Controllers\Auth;

use App\Type;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    public function showRegistrationForm(){
        $types= Type::where('id', '!=' , 1)
        ->get();

        $result = compact('types');
        return view('auth.register', $result);
    }
    protected function redirectPath()
    {
        if (auth()->user()->type_id==4) {
            return '/verantwoordelijke';
        } elseif (auth()->user()->type_id == 3) {
            return '/medewerker';
        }
        else{
            return '/';
        }
    }

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
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'adress' => [ 'string', 'max:255'],
            'city' => [ 'string', 'max:255'],
            'phonenumber' => [ 'numeric', 'min:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'city' => $data['city'],
            'adress' => $data['adress'],
            'phonenumber' => $data['phonenumber'],
            'type_id' => 2,
            'password' => Hash::make($data['password']),
        ]);
    }
}
