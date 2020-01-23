<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Voucher::class, function (Faker $faker) {
    return [
        //
        'code'=>$faker->text(15),
        'amount'=>$faker->randomNumber(8),
        'status'=>'inactive',
        'expiry_date'=>$faker->dateTime()
    ];
});
