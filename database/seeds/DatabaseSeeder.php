<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(SubItemSeeder::class);
    }
}

// Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
