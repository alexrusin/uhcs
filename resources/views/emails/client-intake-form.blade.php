@component('mail::message')
## Client intake form has been submitted

<strong>Client's name:</strong> {{$client->name}}<br> 
<strong>Client's bate of birth:</strong> {{$client->date_of_birth}}<br> 
<strong>Client's contact person:</strong> {{$client->contact_person}}<br>
<strong>Contact person's relationship to client:</strong> {{$client->relationship_to_client}}<br>
<strong>Referred by:</strong> {{$client->referred_by}}<br>
<strong>Contact Email:</strong> {{$client->email}}<br>
<strong>Contact Phone:</strong> {{$client->phone}}<br>
<strong>Client's present location:</strong> {{$client->present_location}}<br>
<strong>Type of care desired</strong> {{$client->care_desired}}<br>
<strong>Client's condition:</strong> {{$client->client_condition}}<br>
<strong>Client's walking ability:</strong> {{$client->walking_ability}}<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
