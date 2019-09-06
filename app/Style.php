<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    //
    public $table ="styles";
    public $primaryKey ="id";
    public $timestamps = false;
    public $guarded =[];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
