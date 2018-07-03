<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    protected $dates = [
    	'date_of_birth', 
    	'created_at',
    	'updated_at'
    ];

    public static function createFromFormRequest()
    {
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

        $dateOfBirth = new Carbon(request('date_of_birth'));

        if (request('date_of_birth')) {
            $dateOfBirthFormatted = $dateOfBirth->format('m/d/Y');
        } else {
            $dateOfBirthFormatted = null;
        }

        $data = [
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

        try {
        	$message = self::create($data);
        } catch (\Exception $e) {
        	\Log::error($e);
        }


        $clientInfo = $data;
        $clientInfo['date_of_birth'] = $dateOfBirthFormatted;

        return (object) $clientInfo;
    }
}
