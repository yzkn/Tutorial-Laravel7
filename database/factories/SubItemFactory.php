<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use App\SubItem;
use Faker\Generator as Faker;

$factory->define(SubItem::class, function (Faker $faker) {
    return [
        'subtitle' => $faker->name,
        'subcontent' => str_random(256),
        'item_id' => function () {
            return Item::all()->random();
        }
    ];
});

// Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
