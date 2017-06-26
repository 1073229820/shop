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

        'user_name' => $faker->word,
        'name' => $faker->name,
        'pass'=>$faker->sha256,
        'email' => $faker->email,
        'userpic' =>$faker->sentence,
        'sex' =>$faker->numberBetween(0,1),
        'phone'=>$faker->phoneNumber,
        'email_code'=>$faker->ean8,
        'addtime'=>$faker->unixTime,
        'status'=>$faker->numberBetween(0,1),
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
