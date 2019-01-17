<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Magazine::class, function (Faker $faker) {

    return [
        'name' => ucwords($faker->words(5, true)),
        "updated_at" => now(),
        "created_at" => now(),
        'publisher_id' => \App\Models\Publisher::inRandomOrder()->first()->id,
    ];
});
