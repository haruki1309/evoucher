<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'password' => bcrypt('12345678'),
        'is_admin' => false,
        'is_brand_owner' => false,
        'brand_id' => 2,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'avt_url' => '',
        'is_activated' => false,
        'lang_key' => 'vi_VN',
        'activation_key' => '',
        'reset_key' => '',
        'created_by' => 1,
        'updated_by' => 1
    ];
});
