<?php

namespace App\Http\Controllers;


use App\Mail\Newsletter;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
	public function index()
	{
		$subs = Subscriber::all();
		return view('admin.subscribers.index',compact('subs'));
	}

	public function delete($id)
	{
		Subscriber::find($id)->delete();
		return back()->with('message','Subscriber deleted successfully.');
	}

	public function store(Request $request)
	{	
		 $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required']
        ]);

        $subscribers = Subscriber::pluck('email')->toArray();

        /** Send mails */
        Mail::to($subscribers)->send(new Newsletter($request->subject, $request->message));

        return redirect()->back()->with('message','Email sent successfully');

	}


}
