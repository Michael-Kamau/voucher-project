<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Voucher::class, function (Faker $faker) {
    return [
        //
        'code'=>$faker->text(5),
        'amount'=>1200,//$faker->randomNumber(8),
        'status'=>'active',
        'expiry_date'=>$faker->dateTime()
    ];
});
