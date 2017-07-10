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

$factory->define(App\Userinfo::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 19),
        'ipaddr' => $faker->phoneNumber,
        'logintime'=>$faker->unixTime,
        'pass_wrong_time_status' =>$faker->numberBetween(0, 1),
    ];
});

$factory->define(App\Link::class, function (Faker\Generator $faker) {
    return [
        'name' =>$faker->name,
        'url' => $faker->url,
        'sort_num'=>$faker->numberBetween(1,100),
        'status' =>$faker->numberBetween(0, 1),
    ];
});


$factory->define(App\Order::class, function (Faker\Generator $faker) {

    $user_ids = \App\User::lists('id')->toArray();

    return [
        'user_id' => $faker->randomElement($user_ids),
        'cnee_name' => $faker->name,
        'cnee_tel' => $faker->phoneNumber,
        'cnee_address' => $faker->address,
        'cnee_province' => $faker->state,
        'cnee_city' => $faker->city,
        'cnee_area' => $faker->streetName,
        'code' => $faker->postcode,
        'order_number' => $faker->e164PhoneNumber,
        'ordertime' => $faker->unixTime,
        'paytime' => $faker->unixTime,
        'total_price' => $faker->randomFloat,
        'status' =>$faker->numberBetween(0, 3),
    ];
});


$factory->define(App\OrdersDetail::class, function (Faker\Generator $faker) {

    $orders_ids = \App\Order::lists('id')->toArray();
    $goods_ids = \App\Goods::lists('id')->toArray();

    return [

        'order_id' => $faker->randomElement($orders_ids),
        'goods_id' => $faker->randomElement($goods_ids),
        'price' => $faker->randomNumber,
        'buynum' => $faker->randomDigitNotNull,
    ];
});


$factory->define(App\GoodsOrders::class, function (Faker\Generator $faker) {

    $orders_ids = \App\Order::lists('id')->toArray();
    $goods_ids = \App\OrdersDetail::lists('goods_id')->toArray();

    return [

        'order_id' => $faker->randomElement($orders_ids),
        'goods_id' => $faker->randomElement($goods_ids),

    ];
});
