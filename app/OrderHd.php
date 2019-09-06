<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHd extends Model
{
    //
    public $table ="orderhd";
    public $primaryKey ="id";
    public $guarded =[];

    public function orderdt(){
        return $this->hasMany('App\OrderDt');
    }

    public function orderadd(){
        return $this->hasOne('App\OrderAdd');
    }

    public function orderpay(){
        return $this->hasOne('App\OrderPay');
    }

}
