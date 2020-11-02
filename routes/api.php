<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\User;
use App\Candidate;
use App\Job;
use App\Diploma;
use App\Company;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('users', function() {

    return User::all();
});
 

 Route::get('jobs', function() {

    return Job::all();
});

 Route::get('filterJobsApi','JobController@indexApi');


 Route::post('createJobApi','JobController@storeApi');

 Route::get('getSuitableJobApi','JobController@getSuitableApi');
 



 Route::get('candidates', function() {

    return Candidate::all();
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