<?php

/** @var Factory $factory */

use App\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'description' => $faker->text,
        'status' => Project::$statuses[$faker->numberBetween(0, 4)]
    ];
});
