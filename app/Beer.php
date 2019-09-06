<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $table ="beers";
    public $primaryKey ="id";
    public $guarded =[];

    public function brand(){
        return $this->belongsTo("App\Brand", "id_brand");
    }

    public function category(){
        return $this->belongsTo("App\Category", "id_category");
    }

    public function style(){
        return $this->belongsTo("App\Style", "id_style");
    }

    public function origin(){
        return $this->belongsTo("App\Origin", "id_origin");
    }
    
}
