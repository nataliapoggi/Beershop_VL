<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAdd extends Model
{
    //
    public $table ="orderadd";
    public $primaryKey ="id";
    public $guarded =[];

    public function orderhd(){
        return $this->belongsTo('App\OrderHd');
    }

}



