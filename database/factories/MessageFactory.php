<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
	   'name' => $faker->name,
	   'contact_person' => $faker->name,
	   'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '-10 years'),
	   'referred_by' => $faker->name,
	   'email' => $faker->unique()->safeEmail,
	   'phone' => $faker->phoneNumber,
	   'relationship_to_client' => 'Spouse',
	   'present_location' => 'Hospital',
	   'care_desired' => 'Assisted Living Home',
	   'client_condition' => "Alzheimer's",
	   'walking_ability' => 'Walker',
    ];
});
