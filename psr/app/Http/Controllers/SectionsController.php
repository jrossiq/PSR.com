<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Section;
use App\Typeview;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menuSections = Section::where('level', 1)
                              ->where('active', 1)->get();

      $menuLeftSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $sections = Section::where('level', 1)->where('active', 1)->get();
      $section = $sections->where('id', 1)->first();
      $subSections = $section->childrens;
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.sections.index', compact('section', 'not_responded', 'sections', 'subSections', 'menuSections', 'menuLeftSections'));
    }

    public function getBySection(Section $section)
    {
      $menuSections = Section::where('level', 1)
                              ->where('active', 1)->get();

      $sections = Section::where('level', 1)->get();
      $subSections = $section->childrens;
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.sections.index', compact('section', 'not_responded', 'subSections', 'menuSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $sections = Section::all();
      $typeviews = Typeview::all();
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.sections.create', compact('sections', 'not_responded', 'menuSections', 'typeviews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $section = new Section($request->all());

      if($request->input('topnav')){
        $content->topnav = 1;
      }else{
        $content->topnav = 0;
      }

      $section->save();
      $message = 'La Sección ha sido creada.';
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.sections.show', compact('section', 'not_responded', 'message', 'menuSections'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $typeviews = Typeview::all();
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.sections.show', compact('section', 'not_responded', 'menuSections', 'typeviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $sections = Section::all();
      $typeviews = Typeview::all();
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.sections.edit', compact('section', 'not_responded', 'sections', 'menuSections', 'typeviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
      $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

      $section->update($request->all());

      if($request->input('topnav')){
        $section->topnav = 1;
      }else{
        $section->topnav = 0;
      }

      $section->save();

      $sections = Section::all();
      $message = 'Las modificaciones fueron guardadas.';
      $typeviews = Typeview::all();
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.sections.edit', compact('section', 'not_responded', 'sections', 'message', 'menuSections', 'typeviews'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
      $menuSections = Section::where('level', 1)->where('active', 1)->get();
      $section->delete();
      $sections = Section::where('level', 1)->get();
      $section = $sections->where('id', 1)->first();
      $subSections = $section->childrens;
      $message = 'La Sección ha sido eliminada.';
      $not_responded = Contact::where('contacted', 0)->get()->count();
      return view('backend.sections.index', compact('section', 'not_responded', 'sections', 'subSections', 'message', 'menuSections'));
    }
}
