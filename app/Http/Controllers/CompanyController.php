<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $data = Company::orderBy('cName','desc')->paginate(8);
          return view('Job.all_companies', compact('data'));

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
            'tel'=>'required',
            'password'=>'required'


        ]);

       


        $company=new Company;
        $company->cName=$request->input('name');
        $company->email=$request->input('email');
        $company->tel=$request->input('tel');
        $company->password=$request->input('password');

    

        $company->save();



        return redirect('manageCompanies')->with('success','Data Saved');
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
            'editTele'=>'required'

        ]);

        $company=Company::findOrFail($request->input('editId'));


        $form_data = array(
            'cName'       =>   $request->input('editName'),
            'email'        =>   $request->input('editEmail'),
            'tel'        =>   $request->input('editTele')

        );
        
        Company::whereId($request->input('editId'))->update($form_data);

        return redirect('manageCompanies')->with('success', 'Data is successfully updated'); 
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

     $data = Company::findOrFail($id);
        $data->delete();

        return redirect('manageCompanies')->with('success', 'Data is successfully deleted');
    }
}
