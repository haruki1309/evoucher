<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $scoreToRank = [
        '1' => 0,
        '2' => 100,
        '3' => 500,
        '4' => 2000,
        '5' => 5000,
        '6' => 15000
    ];
    $rank = $this->faker->numberBetween(1, 6);
    $score = $scoreToRank[$rank];


    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'accumulated_points' => $score,
        'customer_classification_id' => $rank,
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'created_by' => 1,
        'updated_by' => 1,
    ];
});
