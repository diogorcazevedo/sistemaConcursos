<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(IS\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(IS\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word

    ];
});


$factory->define(IS\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10,50)

    ];
});



$factory->define(IS\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state'=>$faker->state,
        'zipcode'=>$faker->postcode

    ];
});


$factory->define(IS\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'client_id' => rand(1,10),
        'total' => rand(50,100),
        'status' => 0

    ];
});


$factory->define(IS\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [

    ];
});

$factory->define(IS\Models\Cupom::class, function (Faker\Generator $faker) {
    return [
        'code' => rand(100,1000),
        'value' => rand(50,100),
    ];
});