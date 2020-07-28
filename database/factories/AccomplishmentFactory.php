<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Accomplishment;
use Faker\Generator as Faker;

$factory->define(Accomplishment::class, function (Faker $faker) {
    return [
        'date' => $faker->date()
    ];
});
