<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'unit_name', 'unit_status',
    ];
    public function item()
    {
        return $this->hasMany('App\Item','item_unit_id','id');
        //return $this->hasMany(Categories::class);
    }
}
