<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    public $table ="brands";
    public $primaryKey ="id";
    public $timestamps = false;
    public $guarded =[];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
