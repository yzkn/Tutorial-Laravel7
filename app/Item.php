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
