<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->content,
        'user_id' => factory('App\User')->create()->id
    ];
});
