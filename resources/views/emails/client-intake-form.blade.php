@component('mail::message')
## Client intake form has been submitted

<strong>Client's Name:</strong> {{$client->name}}<br> 
<strong>Contact Person:</strong> {{$client->contact_person}}<br>
<strong>Referred By:</strong> {{$client->referred_by}}<br>
<strong>Contact Email:</strong> {{$client->email}}<br>
<strong>Contact Phone:</strong> {{$client->phone}}<br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
