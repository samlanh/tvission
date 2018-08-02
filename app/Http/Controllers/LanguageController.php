<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session,Redirect;
use Illuminate\Support\Facades\Input;
use Config;
class LanguageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if($request->ajax()){
             \Session::put('locale',input::get('locale'));
             return 1;
        }
      
        //return Redirect::back();
      
    }
}
