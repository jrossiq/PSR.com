<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\ContactClient;
use App\Section;

class MailController extends Controller
{

  public function respponse(Request $request){

    $contact_id = $request->input('contact_id');
    $user_id = $request->input('user_id');

    Mail::to($request->input('email'))
          ->send(new ContactClient($request->input('name')));

    $sections = Section::all();
    $message = "El Mensaje se ha enviado correctamente.";
    return view('front.contact', compact('sections', 'message'));
  }
}
