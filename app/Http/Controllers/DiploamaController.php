<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Diploma;


class DiploamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $data = Diploma::orderBy('diplomaTitle','desc')->paginate(8);
          return view('Job.add_diploma', compact('data'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

            $this->validate($request,[
            'candidate_id'=>'required',
            'diplomaTitle'=>'required'


        ]);

       


        $Diploma=new Diploma;
        $Diploma->candidate_id=$request->input('candidate_id');
        $Diploma->diplomaTitle=$request->input('diplomaTitle');


    

        $Diploma->save();



        return redirect('manageDiploma')->with('success','Data Saved');
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


          $this->validate($request,[
            'editDiplomaTitle'=>'required'

        ]);

        $Diploma=Diploma::findOrFail($request->input('editId'));


        $form_data = array(
            'diplomaTitle'       =>   $request->input('editDiplomaTitle')

        );
        
        Diploma::whereId($request->input('editId'))->update($form_data);

        return redirect('manageDiploma')->with('success', 'Data is successfully updated'); 
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

    $data = Diploma::findOrFail($id);
        $data->delete();

        return redirect('manageDiploma')->with('success', 'Data is successfully deleted');
    }
}
