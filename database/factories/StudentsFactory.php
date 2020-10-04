<?php

use App\Models\Group;
use App\Models\Student;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Student::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname'  => $faker->lastName,
        'surname'   => $faker->firstName,
        'birthday'  => $faker->dateTimeBetween('-25 years', '-18 years')

    ];
});
