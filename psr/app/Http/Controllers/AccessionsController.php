<?php

namespace App\Http\Controllers;

use App\Accession;
use App\Contact;
use App\Section;

use Illuminate\Http\Request;

class AccessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $menuSections = Section::where('level', 1)
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $menuLeftSections = Section::where('level', 1)
                            ->where('active', 1)->get();

      $accessions = Accession::orderBy('id', 'desc')->get();

      $not_responded = Contact::where('contacted', 0)->get()->count();

      return view('backend.accessions.index', compact('accessions', 'not_responded', 'menuSections', 'menuLeftSections'));
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
    }
}
