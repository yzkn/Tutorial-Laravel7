<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedInteger('item_id');

            $table->text('subtitle')->nullable();
            $table->text('subcontent')->nullable();

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade'); // 外部キー制約
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_items');
    }
}

// Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
