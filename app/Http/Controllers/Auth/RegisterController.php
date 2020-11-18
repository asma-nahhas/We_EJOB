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

use App\Diploma;

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





        protected function registerApi(Request $request)
    {

        if (User::where('email', '=', $request->input('email'))->count() == 0) {

        $user= User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'type' => $request->input('type')

        ]);

        $id = $user->id;
       
   // user found


        if($request->input('type')=='Company')
        {

       Log::info("it is a company");

        $company=new Company;
        $company->id=$id;
        $company->cName=$request->input('name');
        $company->email=$request->input('email');
        $company->tel=$request->input('tel');
        $company->password=$request->input('password');

          $company->save();
    }

   if($request->input('type')=='Candidate')
    {
        Log::info("it is a candidate");
        $candidate=new Candidate;
        $candidate->id=$id;
        $candidate->name=$request->input('name');
        $candidate->email=$request->input('email');
        $candidate->experienceYears=0;
        $candidate->tel=$request->input('tel');
        $candidate->password=$request->input('password');
        $candidate->experienceYears=$request->input('experienceYears');

    

        $candidate->save();


        if($request->input('diplomaType')!=null){

            $diploma_type_arr = explode (",", $request->input('diplomaTitle'));
            $diploma_title_arr = explode (",", $request->input('diplomaType'));

            for($x=0;$x< sizeof($diploma_title_arr);$x++){

            $Diploma=new Diploma;
            $Diploma->candidate_id=$id;
            $Diploma->diplomaTitle=$diploma_title_arr[$x];
            $Diploma->diplomaType=$diploma_type_arr[$x];
            $Diploma->save();

        }

        }



    }


      


         return response()->json(['message'=>'success', 'data'=>$user]);

     }
     else{

            return response()->json(['message'=>'This user is aleardy exists']);


     }

    }



}
