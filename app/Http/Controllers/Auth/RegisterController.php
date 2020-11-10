<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Candidate;

use App\Company;

use Auth;

use Log;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type' => [ 'string'],
            'tel' => ['string','max:10','required'],
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

       

        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $data['type']

        ]);

        $id = $user->id;

        if($data['type']=='Company')
        {

       Log::info("it is a company");

        $company=new Company;
        $company->id=$id;
        $company->cName=$data['name'];
        $company->email=$data['email'];
        $company->tel=$data['tel'];
        $company->password=$data['password'];

          $company->save();
    }
   if($data['type']=='Candidate')
    {
         Log::info("it is a candidate");
         $candidate=new Candidate;
         $candidate->id=$id;
        $candidate->name=$data['name'];
        $candidate->email=$data['email'];
        $candidate->experienceYears=0;
        $candidate->tel=$data['tel'];
        $candidate->password=$data['password'];

    

        $candidate->save();


    }

      


         return $user;
    }
}
