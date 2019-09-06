<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $table ="orders";
    public $primaryKey ="id";
    public $guarded =[];

    public function products(){
        return $this->hasMany('App\Product');
    }

    public function user(){
        return $this->BelongsTo('App\User');
    }
}
