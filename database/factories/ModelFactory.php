<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'description' => $faker->paragraph,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {

    return [
        'area' => "Dhanmondi",
        'plotNo' =>  $faker->randomDigit,
        'roadNo' => $faker->randomDigit,
        'sectorNo' => $faker->randomDigit,
        'address' => $faker->address,
        'serialNo' => $faker->randomDigit,
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});
$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
    'title' => "Mr.",
    'code' => "c-".$faker->randomDigit,
    'name' => $faker->name,
    'cellNo' => "01554322707",
    'phoneNo' => "01554322707",
    'email' => $faker->email,
    'dob' => $faker->date('d/m/Y'),
    'contactPerson' => $faker->name,
    'contactPersonCellNo' => "01554322707",
    'referenceName' => $faker->name,
    'referenceContactNo' => "01554322707",
    'mailingAddress' => $faker->address,
    'profession' => "Teacher",
    'active' => "Yes",
    'salesPerson' => "SRK",
    'groupName' => "Group 02",
    'photo' => "customers/a2d0b9909e2dd98ca39f29fa7d7f8d1d.png",
    ];
});
