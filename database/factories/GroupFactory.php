<?php

use App\Models\Group;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Group::class, function (Faker $faker) {
    return [
        'number'  => 'Group-' . $faker->numberBetween(10, 50),
        'course'  => $faker->numberBetween(1, 5),
        'faculty' => 'Faculty ' . $faker->word()
    ];
});
