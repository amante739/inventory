<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    protected $fillable = [
        'category_id', 'item_code', 'item_name', 'item_unit_id', 'item_status',
    ];

    public function categories()
    {
        return $this->belongsTo('App\Category','category_id','id');
        //('App\Comment', 'foreign_key');
        //return $this->hasMany(Categories::class);
        //Categories
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit','item_unit_id','id');
        //('App\Comment', 'foreign_key');
        //return $this->hasMany(Categories::class);
        //Categories
    }
}
