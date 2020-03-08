<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubItem extends Model
{
    protected $guarded = array('id');

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}

// Copyright (c) 2020 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
