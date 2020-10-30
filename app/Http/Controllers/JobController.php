<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Auth;
use App\Job;
use App\Company;
use App\Candidate;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
     
        $filter=$request->input('filter');

         Log::info($filter);
        if($filter==null){

              $filter='requiredExperienceYears';
        }
        Log::info($filter);

        //now we should check the current company name
         $companyName = Auth::user()->name; 
         Log::info("CompanyName");
         Log::info($companyName);

 
    if($companyName=='admin'){

       

        $data=Job::join('company','job.company_id','company.id')
         ->select(
                  'job.id',
                  'job.title',
                  'job.requiredExperienceYears',
                  'job.salary',
                  'job.requiredEducationLevel',
                  'job.company_id',
                  'company.cName as company_name'
          )->orderBy($filter,'desc')->get();

     }else{



    $data=Job::join('company','job.company_id','company.id')
         ->select(
                  'job.id',
                  'job.title',
                  'job.requiredExperienceYears',
                  'job.salary',
                  'job.requiredEducationLevel',
                  'job.company_id',
                  'company.cName as company_name'
          )->where('company.cName','=',$companyName)->orderBy($filter,'desc')->get();


     }

       $companies=Company::All();

        return view('Job.all_jobs', compact(['data','companies']));
    }

    /**
      Get All specific Candidate Suitable Jobs
    **/

    public function getSuitable(){
        $experianceYears=0;

        $id = Auth::id(); 

        Log::info("id is");
        Log::info($id);
        if(Candidate::find($id)){
        $experianceYears=Candidate::where('id', $id)->first()->experienceYears;
       }
        Log::info($experianceYears);

        if($experianceYears==null){
            $experianceYears=0;
        }

        $data = Job::join('company','job.company_id','company.id')
         ->select(
                  'job.id',
                  'job.title',
                  'job.requiredExperienceYears',
                  'job.salary',
                  'job.requiredEducationLevel',
                  'job.company_id',
                  'company.cName as company_name'
          )->where('requiredExperienceYears','=',$experianceYears)->get();

           return view('Job.suitable-Jobs', compact('data'));
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
            $this->validate($request,[
            'Title'=>'required',
            'Salary'=>'required',
            'Level'=>'required',
            'Years'=>'required',
            'Company'=>'required'


        ]);

       


        $job=new Job;
        $job->company_id=$request->input('Company');
        $job->title=$request->input('Title');
        $job->salary=$request->input('Salary');
        $job->requiredEducationLevel=$request->input('Level');
        $job->requiredExperienceYears=$request->input('Years');
    

        $job->save();



        return redirect('manageJobs')->with('success','Data Saved');
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
            'editTitle'=>'required',
            'editSalary'=>'required',
            'editLevel'=>'required',
            'editYears'=>'required',

        ]);

        $job=Job::findOrFail($request->input('editId'));


        $form_data = array(
            'title'       =>   $request->input('editTitle'),
            'salary'        =>   $request->input('editSalary'),
            'requiredExperienceYears'        =>   $request->input('editYears'),
            'requiredEducationLevel'        =>   $request->input('editLevel')

        );
        
        Job::whereId($request->input('editId'))->update($form_data);

        return redirect('manageJobs')->with('success', 'Data is successfully updated');  
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

        $data = Job::findOrFail($id);
        $data->delete();

        return redirect('manageJobs')->with('success', 'Data is successfully deleted');
    }
}
