<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
    $faker->addProvider(new Liior\Faker\Prices($faker));

    $name = $faker->productName;
    return [
        'name' => $name,
        'description' => $faker->name.' '.$faker->sentence(5),
        'sku' => rand(1,100).'-'.$name,
        'price' => $faker->price(50, 1000, true)
    ];
});
