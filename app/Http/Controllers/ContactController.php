<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('website.contact.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email'=>['required','email','max:255'],
            'subject'=>['required','max:255'],
            'message'=>['required','max:500'],
        ]);

        try {

            $toMail = ContactMail::where('language','en')->first();

            Mail::to($toMail->email)->send(new ContactMail($request->subject,$request->message,$request->email));

        } catch(\Exception $e){
                notify()->success()->($e->getMessage());
        }


    }
}
