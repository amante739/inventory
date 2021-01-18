<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name'
    ];

    public function item()
    {
        return $this->hasMany('App\Item','category_id','id');
        //return $this->hasMany(Categories::class);
    }
}
