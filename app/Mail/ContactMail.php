<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contactdata;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->contactdata = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->contactdata->email,$this->contactdata->name,)
        ->subject('NEW CONTACT MAIL')
        ->with([
            'message'   =>  $this->contactdata->message,
            'name'  =>  $this->contactdata->name,
            'phonenumber'=>  $this->contactdata->phonenumber
        ])->markdown('emails.contactus');
}
    }

