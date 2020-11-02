<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Candidate;
use App\User;
use Auth;
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
        $id = Auth::id(); 
        $data = User::where('id','=',$id)->first();

          return view('Job.Create_Profile', compact('data'));
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

    public function store2(Request $request)
    {
        //

         $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'experienceYears'=>'required',
            'password'=>'required'


        ]);



        $id = Auth::id(); 
        $data = Candidate::where('id','=',$id)->first();
        if($data==null){


        $candidate=new Candidate;
        $candidate->id=$id;
        $candidate->name=$request->input('name');
        $candidate->email=$request->input('email');
        $candidate->experienceYears=$request->input('experienceYears');
        $candidate->password=$request->input('password');

    

        $candidate->save();

    }else{

         $form_data = array(
            'name'             =>   $request->input('name'),
            'email'            =>   $request->input('email'),
            'experienceYears'  =>   $request->input('experienceYears')

        );
        
        Candidate::whereId($id)->update($form_data);

    }

        return redirect('myProfile')->with('success','Data Saved');
    }



        public function storeCandidateApi(Request $request)
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



        return response()->json($candidate);
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
