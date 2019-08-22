<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'gender' => $faker->numberBetween($min = 1, $max = 2),
        'age_id' => $faker->numberBetween($min = 1, $max = 6),
        'email' => $faker->email,
        'is_sent_email' => $faker->numberBetween($min = 0, $max = 1),
        'feedback' => $faker->realText($maxNbChars = 300, $indexSize = 1),
    ];
});
