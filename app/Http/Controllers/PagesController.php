<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth', ['except' => ['home', 'show']]);
    }
    
    //
    public function index(){

        $title = "Welcome to Laravel";
        return view('pages.index', compact('title'));
    }

    public function about(){
        $about = 'About Us';
        return view('pages.about')->with('about', $about);
    }

    public function services(){
        $service = "Our Services";
        $data = array(
            'title' => 'services',
            'services' => ['Web Design', 'Network Service', 'Configuration'],
            'test' => 'test',
        );

        return view('pages.services')->with($data);        
        //return view('pages.services')->with('services', $data);
        // return $data;
    }

    public function home(){

        $title = "Welcome to Laravel";
        return view('pages.home', compact('title'));
    }
}
