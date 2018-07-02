<?php
namespace App\Http\Controllers;

use App\Client;
use Carbon\Carbon;
use App\Mail\ClientIntakeForm;
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

        if (request('present_location') === 'Other' && !is_null(request('present_location_specify'))) {
            $presentLocation = request('present_location_specify');
        } else {
            $presentLocation = request('present_location');
        }

        if (request('client_condition') === 'Confused' && !is_null(request('client_condition_specify'))) {
            $clientCondition = request('client_condition_specify');
        } else {
            $clientCondition = request('client_condition');
        }

        if (request('walking_ability') === 'Non-ambulatory' && !is_null(request('walking_ability_specify'))) {
            $walkingAbility = request('walking_ability_specify');
        } else {
            $walkingAbility = request('walking_ability');
        }

        if (request('date_of_birth')) {
            $dateOfBirth = (new Carbon(request('date_of_birth')))->format('m/d/Y');
        } else {
            $dateOfBirth = null;
        }

       
        

        $client = (object) [
            'name' => request('name'),
            'contact_person' => request('contact_person'),
            'date_of_birth' => $dateOfBirth,
            'referred_by' => request('referred_by'),
            'email' => request('email'),
            'phone' => request('phone'),
            'relationship_to_client' => request('relationship_to_client'),
            'present_location' => $presentLocation,
            'care_desired' => request('care_desired'),
            'client_condition' => $clientCondition,
            'walking_ability' => $walkingAbility,

        ];

        $emails = config('mail.send_email_to');
        $emailsArray = explode(',', $emails);

        \Mail::to($emailsArray)
            ->queue(new ClientIntakeForm($client));
        
        return response(['message' => 'Your request has been submitted. Someone will contact you shortly'], 200);
    }
}

