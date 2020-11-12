<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\User;
use App\Candidate;
use App\Job;
use App\Diploma;
use App\Company;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* 
1

POST

Register API (if type candidate we create user then create candidate) (if user type company we create  user then company) --done

*/

 Route::post('RegisterApi','Auth\RegisterController@registerApi');


/*
2

POST
Login API (just need email and password) return Login succesfully --done

*/

 Route::post('LoginApi','Auth\LoginController@loginApi');

/*
3

GET
Suitable jobs by user id (we get matched jobs to user diploma and user experiance years) and send company name not just id --done
*/

 Route::get('getSuitableJobApi','JobController@getSuitableJobApi');

/*
4

GET
get jobs ordered by experiance years (order jobs orderer descing)  and send company name --done
*/

 Route::get('filterJobsByYearsApi','JobController@orderByYearsApi');


/*
5

GET
get jobs ordered by Diploma (order by diploma desc) and send company name --done
*/

 Route::get('filterJobsByExperianceApi','JobController@orderByLevelApi');

/*
6

POST
create company by admin this will add a new user first then this company --done
*/

 Route::post('createCompanyApi','CompanyController@createCompany');

/*
7

POST

create new job request --done
*/

 Route::post('createJobApi','JobController@storeApi');

/*
8

GET
list of candidaates suitable for a specicfic job ( I get the job id and return all candidates suitaable for this job) --done
*/

 Route::get('getSuitableCandidates', 'CandidateController@suitableCandidatesApi');










Route::get('users', function() {

    return User::all();
});

 Route::get('test','JobController@test');
 

 Route::get('jobs', function() {

    return Job::all();
});







 





 

  Route::post('createCandidateApi','CandidateController@storeCandidateApi');


 Route::get('diplomas', function() {

    return Diploma::all();
});

 Route::post('createDiplomaApi','DiploamaController@storeDiplomaApi');



 Route::get('companies', function() {

    return Company::all();
});


Route::get('users/{id}', function($id) {
    return User::find($id);
});

Route::post('users', function(Request $request) {
    return User::create($request->all);
});

Route::put('users/{id}', function(Request $request, $id) {
    $user = User::findOrFail($id);
    $user->update($request->all());

    return $user;
});

Route::delete('users/{id}', function($id) {
    User::find($id)->delete();

    return 204;
});