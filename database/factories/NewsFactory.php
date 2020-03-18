<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->text(),
        'user_id' => factory('App\User')->create()->id,
        'image' => $faker->image('public/storage/images',400,300, null, false),
    ];
});
