<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    //
    public $table ="origins";
    public $primaryKey ="id";
    public $timestamps = false;
    public $guarded =[];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
