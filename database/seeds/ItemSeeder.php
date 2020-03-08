<?php

use App\Item;
use App\SubItem;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Item', 10)->create();
    }
}

// Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
