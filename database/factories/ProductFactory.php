<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;


$factory->define(Product::class, function (Faker $faker) {
    return [
        'name_product' => $faker->sentence(1),
        'price' => $faker->randomFloat(2, 0, 2000),
        'description' => $faker->paragraph,
        'user_id' => $faker->numberBetween(1, 10),
    ];
});
