<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderLine;
use App\Order;
use App\Meal;
use Faker\Generator as Faker;

$factory->define(OrderLine::class, function (Faker $faker) {
    return [
        'order_id' => Order::get('id')->random(),
        'meal_id' => Meal::get('id')->random(),
        'quantity_ordered' => $faker->numberBetween(1, 20),
        'price_each' => $faker->randomFloat(3, 2, 1000),
        'created_at' => now()
    ];
});
