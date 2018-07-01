<?php
namespace App\Http\Controllers;

use App\Client;
use App\Mail\ClientIntakeForm;
use App\Rules\Recaptcha;

class FormController extends Controller
{
    public function storeClient(Recaptcha $recaptcha)
    {
        request()->validate([
            'name' => 'required|max:150',
            'contact_person' => 'required|max:150',
            'phone' => 'nullable|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
            'email' => 'required|email',
            
            // 'g_recaptcha_response' => [$recaptcha]
        ]); 

        $client = (object) [
            'name' => request('name'),
            'contact_person' => request('contact_person'),
            'referred_by' => request('referred_by'),
            'email' => request('email'),
            'phone' => request('phone'),
        ];

        $emails = config('mail.send_email_to');
        $emailsArray = explode(',', $emails);

        \Mail::to($emailsArray)
            ->queue(new ClientIntakeForm($client));
        
        return response(['message' => 'Your request has been submitted. Someone will contact you shortly'], 200);
    }
}

