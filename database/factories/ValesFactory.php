<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Vale;
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

$factory->define(Vale::class, function (Faker $faker) {
    $number = 20;
    return [
        'customer_name' => $faker->name(),
        'date' => $faker->dateTime(),
        'address' => $faker->city(),
        'plate_number' => $faker->uuid(),
        'description' => $faker->name(),
        'quantity' => $faker->numberBetween(1,200),
        'unit_cost' => $faker->numberBetween(1,200),
        'total_amount' => $faker->numberBetween(1,200),
    ];
});
