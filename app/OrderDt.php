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
        return $this->BelongsTo('App\OrderHd');
    }

}
