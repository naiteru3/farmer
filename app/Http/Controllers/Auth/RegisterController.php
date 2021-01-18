<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'furigana' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'min:11'],
            'representatives_name' => ['string','nullable'],
            'office_name' => ['string','nullable'],
            'office' => ['string','nullable'],
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
        $representatives_name="";
        if(isset($data['representatives_name'])){
            $representatives_name=$data['representatives_name'];
        }
        
        $office_name="";
        if(isset($data['office_name'])){
            $office_name=$data['office_name'];
        }
        
        $office="";
        if(isset($data['office'])){
            $office=$data['office'];
        }
        
        return User::create([
            'name' => $data['name'],
            'furigana' => $data['furigana'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'representatives_name' => $representatives_name,
            'office_name' => $office_name,
            'office' => $office,
            
        ]);
    }
    
    public function redirectPath()
    {
        return 'admin/product/index';
        
    }
}
