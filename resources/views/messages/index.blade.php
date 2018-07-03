@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Messages</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{{$messages->links()}}
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-md-12">
            @forelse ($messages as $message)
			<div class="panel panel-default">
			    <div class="panel-heading">
			       <div class="level">
			            <div class="flex">
			                <h4>
			                  
	                            <strong>
	                                {{$message->name}}
	                            </strong>
			                     
			                </h4>

			            </div>

			            <h5>Received: {{$message->created_at->diffForHumans()}};
			            </h5>
			        </div> 
			    </div>
			    <div class="panel-body">
			    	<div class="row">
						<div class="col-md-6">
							<strong>Client's bate of birth:</strong> {{$message->date_of_birth->format('m/d/Y')}}<br> 
							<strong>Client's contact person:</strong> {{$message->contact_person}}<br>
							<strong>Contact person's relationship to client:</strong> {{$message->relationship_to_client}}<br>
							<strong>Referred by:</strong> {{$message->referred_by}}<br>
							<strong>Contact Email:</strong> {{$message->email}}<br>
						</div>
						<div class="col-md-6">
							<strong>Contact Phone:</strong> {{$message->phone}}<br>
							<strong>Client's present location:</strong> {{$message->present_location}}<br>
							<strong>Type of care desired</strong> {{$message->care_desired}}<br>
							<strong>Client's condition:</strong> {{$message->client_condition}}<br>
							<strong>Client's walking ability:</strong> {{$message->walking_ability}}<br>
						</div>
					</div>
			    </div>
			    <div class="panel-footer">
				    <div class="row">
						<div class="col-md-12">
							<div class="text-right">
								<a href="#" class="btn btn-primary">Create Client Record</a>
				       			<a href="#" class="btn btn-danger">Delete</a>
							</div>
						</div>
					</div>
			    </div>
			</div>

			@empty
			    <p>There are no messages at this time</p>
			@endforelse
        </div>
        <div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{{$messages->links()}}
			</div>
		</div>
	</div>
    </div>
</div>

@endsection