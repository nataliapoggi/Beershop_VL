<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDt extends Model
{
    //
    public $table ="orderdt";
    public $primaryKey ="id";
    public $guarded =[];

    public function orderhd(){
        return $this->belongsTo('App\OrderHd');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

}
