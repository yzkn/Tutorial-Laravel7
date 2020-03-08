<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => str_random(256),
    ];
});

// Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
