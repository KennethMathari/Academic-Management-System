<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;



class ContactController extends Controller
{
    public function sendContactMail(Request $request)
    {
        Mail::to('info@cornerstoneacademy.co.ke')->send(new ContactMail($request));
        // Session::flash('success','Message Sent Successfully!');
        return redirect()->back()->with('success', 'Message sent successfully! We will get back to you.');
    }
}
