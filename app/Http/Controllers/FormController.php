<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\ClientIntakeForm;
use App\Message;
use App\Rules\Recaptcha;

class FormController extends Controller
{
    public function storeClient(Recaptcha $recaptcha)
    {

        $beforeDate = Carbon::now()->subYears(10)->format('m/d/Y');
        $afterDate = Carbon::now()->subYears(100)->format('m/d/Y');

        request()->validate([
            'name' => 'required|max:150',
            'contact_person' => 'required|max:150',
            'phone' => 'nullable|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
            'date_of_birth' => "nullable|before:$beforeDate|after:$afterDate",
            'email' => 'required|email',
            'relationship_to_client' => 'required',
            'present_location' => 'required',
            'care_desired' => 'required',
            'client_condition' => 'required',
            'walking_ability' => 'required',
            
            'g_recaptcha_response' => [$recaptcha]
        ]); 

        $clientInfo = Message::createFromFormRequest();
        $emails = config('mail.send_email_to');
        $emailsArray = explode(',', $emails);

        \Mail::to($emailsArray)
            ->queue(new ClientIntakeForm($clientInfo));
        
        return response(['message' => 'Your request has been submitted. Someone will contact you shortly'], 200);
    }
}

