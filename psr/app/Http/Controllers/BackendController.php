<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Section;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $muneLeftSections = Section::where('level', 1)
                              ->where('active', 1)->get();
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.index', compact('menuSections', 'not_responded' , 'muneLeftSections'));
    }
}
