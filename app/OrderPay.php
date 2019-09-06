<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPay extends Model
{
    //
    public $table ="orderpay";
    public $primaryKey ="id";
    public $guarded =[];

    public function orderhd(){
        return $this->BelongsTo('App\OrderHd');
    }

}
