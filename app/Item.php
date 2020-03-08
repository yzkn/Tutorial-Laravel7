<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = array('id');

    public function sub_items()
    {
        return $this->hasMany('App\SubItem');
    }
}

// Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
