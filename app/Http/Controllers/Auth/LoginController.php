<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use Log;
use App\Candidate;
use App\Company;

use App\Diploma;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


         protected function loginApi(Request $request)
    {
                $email=$request->input('email');
                $password=$request->input('password');
                $diplomaObj=null;

               $user = User::whereEmail($email)->first();

               if($user==null )
                   return response()->json(['message'=>'No User has this Email ']);

               else{


                Log::info($password);

                if($user->type=='Company'){

                      $user = Company::whereEmail($email)->first();
                      $type='Company';


                }else{

                      $user = Candidate::whereEmail($email)->first();
                      $type='Candidate';

                      $diplomaObj=Diploma::where('candidate_id','=',$user->id)->get();
                        Log::info($diplomaObj);


                }

                 Log::info($user->password);



          

                if($user!=null){

                    if($user->password==$password){

                 if($diplomaObj!=null){

                         return response()->json(['message'=>'success','type'=>$type, 'data'=>$user,'Diploma'=> $diplomaObj]);
                           
                      }

                     return response()->json(['message'=>'success','type'=>$type, 'data'=>$user]);

                 }else{

                     return response()->json(['message'=>'password not correct']);
                 }


                }else{

                     return response()->json(['message'=>'Not Found User']);
                }

            }
    }
}
