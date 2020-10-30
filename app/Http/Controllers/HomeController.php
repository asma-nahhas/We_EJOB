<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Log;
use App\Candidate;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $id=Auth::id();
       $type=Auth::user()->type;
        Log::info($id);
        Log::info($type);
        $hasCandidate=1;
        $Candidate = Candidate::find($id);
        Log::info($hasCandidate);
        if($Candidate==null)
            $hasCandidate=0;


        return view('home', compact(['type','hasCandidate']));
    }
}
