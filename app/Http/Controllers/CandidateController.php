<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Candidate;
use App\User;
use App\Job;
use App\Diploma;
use Auth;
use Log;


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
        $data = Candidate::where('id','=',$id)->first();

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
            'tel' =>'required',
            'password'=>'required'


        ]);

       


        $candidate=new Candidate;
        $candidate->name=$request->input('name');
        $candidate->email=$request->input('email');
        $candidate->experienceYears=$request->input('experienceYears');
        $candidate->password=$request->input('password');
        $candidate->tel=$request->input('tel');

    

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
            'password'=>'required',
            'tel'=>'required'


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
        $candidate->tel=$request->input('tel');


    

        $candidate->save();

    }else{

         $form_data = array(
            'name'             =>   $request->input('name'),
            'email'            =>   $request->input('email'),
            'experienceYears'  =>   $request->input('experienceYears'),
            'tel'              =>   $request->input('tel')

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
            'password'=>'required',
            'tel' => 'required'


        ]);

       


        $candidate=new Candidate;
        $candidate->name=$request->input('name');
        $candidate->email=$request->input('email');
        $candidate->experienceYears=$request->input('experienceYears');
        $candidate->password=$request->input('password');
        $candidate->tel=$request->input('tel');

    

        $candidate->save();



        return response()->json($candidate);
    }




    /**
        Get suitable candidates for a specific job
    **/
     public function suitableCandidatesApi(Request $request){

                $experianceYears=0;
                $diploma='Bachelor';

                $job=Job::where('id','=',$request->input('id'))->first();

                


                 $experianceYears=  $job->requiredExperienceYears;
                 Log::info($job);
                 $diploma=$job->requiredEducationLevel;
                 Log::info($diploma);
              

               

                if($experianceYears==null){
                    $experianceYears=0;
                }

                if($diploma==null){
                    $diploma='Bachelor';
                }

                 Log::info($experianceYears);

                 Log::info($diploma);

                $data = Candidate::join('diploma','diploma.candidate_id','candidate.id')
                 ->select(
                          'candidate.id',
                          'candidate.name',
                          'candidate.experienceYears',
                          'candidate.email',
                          'diploma.diplomaType'
                  )->where([['experienceYears','>=',$experianceYears],['diplomaType','=',$diploma]])->get();

                   return response()->json($data);
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
            'editExperianceYears'=>'required',
            'editTel'=>'required'

        ]);

        $candidate=Candidate::findOrFail($request->input('editId'));


        $form_data = array(
            'name'             =>   $request->input('editName'),
            'email'            =>   $request->input('editEmail'),
            'experienceYears'  =>   $request->input('editExperianceYears'),
            'tel'              => $request->input('editTel')

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
