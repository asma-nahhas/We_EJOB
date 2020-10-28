<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Redirect,Response,DB,Config;
use Yajra\DataTables\Services\DataTables;


use App\Appointment;
use App\User;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Appointment::whereNull('response')->orderBy('created_at','desc')->paginate(8);
        return view('Appointment', compact('data'));
    }

    public function userAppointment()
    {
        //
        $user = Auth::user();
        $id=Auth::user()->id;

        $data = Appointment::where('user_id',$id)->orderBy('created_at','desc')->paginate(8);

    
        return view('My_Appointment', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

 public function store2(Request $request)
    {
        
//First Check User Authentication To make an Consultation
if (Auth::check()) {

    $method=$request->input('method');


    //if we want to make Expert Consultation 
    if($method=='Expert'){


          //make Fields values validation Server Side
          $request->validate([
                    'Name'=>'required',
                    'age'=>'required|numeric|min:18',
                    'emailAddress'=>'required|email',
                    'chest_pain_type'=>'required',
                    'rest_blood_pressure'=>'required|numeric',
                    'max_heart_rate'=>'required|numeric',
                    'rest_electro'=>'required',
                    'blood_sugar'=>'required',
                    'exerscice_angina'=>'required',
                    'captcha'=>'required|captcha'
                ],['captcha.captcha'=>'Invalid captcha code.']);


          //Get current user ID
         $user_id= Auth::user()->id;

         //Create New Consultation/Appointment
        $appointment=new Appointment;

        $appointment->user_id=$user_id;

        $appointment->name=$request->input('Name');

        $appointment->emailAddress=$request->input('emailAddress');

        $appointment->phoneNumber=$request->input('phoneNumber');

        $appointment->address=$request->input('address');

        $appointment->gender=$request->input('gender');

         $appointment->age=$request->input('age');


        $appointment->chest_pain_type=$request->input('chest_pain_type');

        $appointment->rest_blood_pressure=$request->input('rest_blood_pressure');

        $appointment->max_heart_rate=$request->input('max_heart_rate');

        $appointment->rest_electro=$request->input('rest_electro');

        $appointment->exerscice_angina=$request->input('exerscice_angina');

        $appointment->blood_sugar=$request->input('blood_sugar');

        $appointment->note=$request->input('note');

        $appointment->response=$request->input('response');

        //Save this Consultation To the Database
        $appointment->save();

        return redirect('index#Appointment')->with('success','Data Saved');

    }
            }else{
        return redirect('login');


        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::check()) {

           $user_id= Auth::user()->id;


        $appointment=new Appointment;
        $appointment->name=$request->input('Name');

        $appointment->user_id=$user_id;

        $appointment->emailAddress=$request->input('emailAddress');

        $appointment->phoneNumber=$request->input('phoneNumber');

        $appointment->address=$request->input('address');

        $appointment->gender=$request->input('gender');

         $appointment->age=$request->input('age');


        $appointment->chest_pain_type=$request->input('chest_pain_type');

        $appointment->rest_blood_pressure=$request->input('rest_blood_pressure');

        $appointment->max_heart_rate=$request->input('max_heart_rate');

        $appointment->rest_electro=$request->input('rest_electro');

        $appointment->exerscice_angina=$request->input('exerscice_angina');

        $appointment->blood_sugar=$request->input('blood_sugar');

        $appointment->note=$request->input('note');

        $appointment->response=$request->input('response');


        $appointment->save();
        $user_name= Auth::user()->name;

        if($user_name=='admin')
            return redirect('Appointment')->with('success','Data Saved');
        else
            return redirect('My_Appointment')->with('success','Data Saved');


            }else{
        return redirect('login');


        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $editinfo = Appointment::findOrFail($id);
        return view('Appointment', compact('editinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

          $form_data = array(
            'response'=>   $request->input('editResponse')
        );

        Appointment::whereId($request->input('editId'))->update($form_data);

        return redirect('Appointment')->with('success', 'Data is successfully updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $data = Appointment::findOrFail($id);
        $data->delete();
         $user_name= Auth::user()->name;

        if($user_name=='admin')
            return redirect('Appointment')->with('success','Data is successfully deleted');
        else
            return redirect('My_Appointment')->with('success','Data is successfully deleted');

    }
}
