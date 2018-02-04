<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Country;
use App\Province;
use App\Section;
use App\Type;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
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
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $menuLeftSections = Section::where('level', 1)
                            ->where('active', 1)->get();

      $not_responded = Contact::where('contacted', 0)->get()->count();
      $contacts = Contact::orderBy('id', 'desc')->get();
      $users = User::all();
      return view('backend.users.index', compact('contacts', 'users', 'not_responded', 'menuSections', 'menuLeftSections'));
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

      $menuLeftSections = Section::where('level', 1)
                            ->where('active', 1)->get();

      $not_responded = Contact::where('contacted', 0)->get()->count();
      $contacts = Contact::orderBy('id', 'desc')->get();
      $types = Type::all();
      $provinces = Province::orderBy('id', 'asc')->get();
      $countries = Country::where('id','>','1')->get();
      return view('backend.users.create', compact('contacts', 'users', 'types', 'provinces', 'countries', 'not_responded', 'menuSections', 'menuLeftSections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = new User($request->except('provinces', 'countries', 'password'));

      $user->password = Hash::make($request->input('password'));

      $user->active = 1;
      
      $user->save();

      if($request->input('provinces')){
        $user->provinces()->sync($request->input('provinces'));
      }

      if($request->input('countries')){
        $user->countries()->sync($request->input('countries'));
      }

      $menuSections = Section::where('level', 1)
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $menuLeftSections = Section::where('level', 1)
                            ->where('active', 1)->get();

      $not_responded = Contact::where('contacted', 0)->get()->count();
      $contacts = Contact::orderBy('id', 'desc')->get();
      $users = User::all();
      $message = "El Usuario se creó correctamente";
      return view('backend.users.index', compact('contacts', 'message', 'users', 'not_responded', 'menuSections', 'menuLeftSections'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $menuSections = Section::where('level', 1)
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $menuLeftSections = Section::where('level', 1)
                            ->where('active', 1)->get();

      $not_responded = Contact::where('contacted', 0)->get()->count();
      $contacts = Contact::orderBy('id', 'desc')->get();
      return view('backend.users.show', compact('user', 'contacts', 'not_responded', 'menuSections', 'menuLeftSections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $menuSections = Section::where('level', 1)
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $menuLeftSections = Section::where('level', 1)
                            ->where('active', 1)->get();

      $not_responded = Contact::where('contacted', 0)->get()->count();
      $contacts = Contact::orderBy('id', 'desc')->get();
      $types = Type::all();
      $provinces = Province::orderBy('id', 'asc')->get();
      $countries = Country::where('id','>','1')->get();
      return view('backend.users.edit', compact('user', 'provinces', 'countries', 'types', 'contacts', 'not_responded', 'menuSections', 'menuLeftSections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $user->update($request->except('provinces', 'countries', 'img'));

      if($request->file('img')){
        $path = 'img/users/';
        $file = $request->file('img');
    		$name = $path.'user-image-'.$user->id.'.'.$file->getClientOriginalExtension();
        $imageFile = Image::make($request->file('img'));
        $imageFile->save($name);
        $user->img = $name;
        $user->save();
      }

      if($request->input('provinces')){
        $user->provinces()->sync($request->input('provinces'));
      }

      if($request->input('countries')){
        $user->countries()->sync($request->input('countries'));
      }

      $menuSections = Section::where('level', 1)
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $menuLeftSections = Section::where('level', 1)
                            ->where('active', 1)->get();

      $not_responded = Contact::where('contacted', 0)->get()->count();
      $contacts = Contact::orderBy('id', 'desc')->get();
      $types = Type::all();
      $provinces = Province::orderBy('id', 'asc')->get();
      $countries = Country::where('id','>','1')->get();
      $message = "Los datos fueron editados correctamente";
      return view('backend.users.edit', compact('user', 'message', 'provinces', 'countries', 'types', 'contacts', 'not_responded', 'menuSections', 'menuLeftSections'));
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
