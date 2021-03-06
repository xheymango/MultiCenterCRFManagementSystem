<?php

namespace App\Http\Controllers;
use App\PatientStudySpecific;
use App\User;
use App\studySpecific;
use Illuminate\Http\Request;

class PagesController extends Controller
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
    public function loginPage()
    {
        return redirect('/login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = studySpecific::all();
        return view('dashboard')->with('studies',$data);
    }
    public function preScreening()
    {
        return view('preScreening');
    }
    public function preScreeningForm()
    {
        return view('preScreeningForm');
    }
    public function studySpecific()
    {
        return view('studySpecific');
    }
    public function preScreeningDB()
    {
        return view('preScreeningdb');
    }
    public function chooseStudy()
    {
        $studies=studySpecific::get();

        $data = $studies->pluck('name','id');
        return view('chooseStudy',compact('studies'));
    }
}
