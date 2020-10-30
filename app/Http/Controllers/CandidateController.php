<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Candidate;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $data = Candidate::orderBy('name','desc')->paginate(8);
          return view('Job.all_candidates', compact('data'));
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
            'name'=>'required',
            'email'=>'required',
            'experienceYears'=>'required',
            'password'=>'required'


        ]);

       


        $candidate=new Candidate;
        $candidate->name=$request->input('name');
        $candidate->email=$request->input('email');
        $candidate->experienceYears=$request->input('experienceYears');
        $candidate->password=$request->input('password');

    

        $candidate->save();



        return redirect('manageCandidates')->with('success','Data Saved');
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
            'editName'=>'required',
            'editEmail'=>'required',
            'editExperianceYears'=>'required'

        ]);

        $company=Candidate::findOrFail($request->input('editId'));


        $form_data = array(
            'name'             =>   $request->input('editName'),
            'email'            =>   $request->input('editEmail'),
            'experienceYears'  =>   $request->input('editExperianceYears')

        );
        
        Candidate::whereId($request->input('editId'))->update($form_data);

        return redirect('manageCandidates')->with('success', 'Data is successfully updated'); 
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

     $data = Candidate::findOrFail($id);
        $data->delete();

        return redirect('manageCandidates')->with('success', 'Data is successfully deleted');
    }
}
