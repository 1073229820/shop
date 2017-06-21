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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Goods::class, function (Faker\Generator $faker) {
    return [
        'cat_id' => $faker->randomDigitNotNull,
        'type_id' => $faker->randomDigitNotNull,
        'goods_name' => $faker->word,
        'descr' => $faker->paragraph,
        'price' => $faker->randomFloat(2),
        'logo' => $faker->sentence,
        'status' => $faker->numberBetween(1, 3),
        'store' => $faker->randomNumber,
        'num' => $faker->randomDigit,
        'clicknum' => $faker->randomNumber,
        'addtime' => $faker->unixTime,
    ];
});
