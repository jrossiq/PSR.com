<?php

namespace App\Http\Controllers;

use App\Section;
use App\Contact;
use App\Province;
use App\Response;
use App\User;

use Illuminate\Http\Request;

class ContactsController extends Controller
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

        $contacts = Contact::orderBy('id', 'desc')->get();
        $not_responded = Contact::where('contacted', 0)->get()->count();
        $noCoordinators = Contact::where('no_coordinator', 1)->get();

        return view('backend.contacts.index', compact('contacts', 'noCoordinators', 'not_responded', 'menuSections', 'menuLeftSections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $contact = new Contact($request->all());
      $contact->save();
      return response()->json([
        'name' => $contact->name,
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $contact->view = 1;
        $contact->save();

        $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

        $contacts = Contact::orderBy('id', 'desc')->get();
        $not_responded = Contact::where('contacted', 0)->get()->count();
        $provinces = Province::orderBy('name', 'asc')->get();
        $users = User::where('type_id', 3)->get();
        $admins = User::where('type_id', 2)->get();
        $noCoordinators = Contact::where('no_coordinator', 1)->get();
        return view('backend.contacts.show', compact('contacts', 'noCoordinators', 'admins', 'users', 'not_responded','section', 'contact', 'menuSections', 'provinces'));
    }

    public function userContact(Contact $contact){
        $contact->userView = 1;
        $contact->save();
        $admins = User::where('type_id', 2)->get();
        return view('backend.contacts.userView', compact('contact', 'admins'));
    }

    public function response(Request $request, Contact $contact)
    {
      // Mail::send(['text' => 'mail'], $request, function($message){
      //         $message->to($contact->emal, $contact->name)->subject('Respuesta Contacto PSR');
      //         $message->from('no_responder@psr.com.ar', 'PSR');
      //       });

        $contact->contacted = 1;
        $contact->save();

        $response = new Response($request->all());

        $response->save();

        $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

        $contacts = Contact::orderBy('id', 'desc')->get();
        $not_responded = Contact::where('contacted', 0)->get()->count();
        $users = User::where('type_id', 3)->get();
        $provinces = Province::orderBy('name', 'asc')->get();

        return view('backend.contacts.show', compact('contacts', 'provinces', 'users', 'not_responded','section', 'contact', 'menuSections'));
    }

    public function addUser(Request $request, Contact $contact){
      $contact->update($request->all());
      $contact->save();

      $menuSections = Section::where('level', 1)
                            ->where('topnav_back', 1)
                            ->where('active', 1)->get();

      $contacts = Contact::orderBy('id', 'desc')->get();
      $not_responded = Contact::where('contacted', 0)->get()->count();
      $users = User::where('type_id', 3)->get();
      $provinces = Province::orderBy('name', 'asc')->get();
      $admins = User::where('type_id', 2)->get();

      return view('backend.contacts.show', compact('contacts', 'admins', 'users', 'not_responded','section', 'contact', 'menuSections', 'provinces'));
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
    public function destroy(Contact $contact)
    {
        $contact->delete();

        $menuSections = Section::where('level', 1)
                              ->where('topnav_back', 1)
                              ->where('active', 1)->get();

        $contacts = Contact::orderBy('id', 'desc')->get();
        $message = 'El contacto ha sido eliminado.';
        $not_responded = Contact::where('contacted', 0)->get()->count();
        return view('backend.contacts.index', compact('contacts', 'not_responded', 'menuSections', 'message'));
    }
}
