<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('beers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255) ;
            $table->unsignedDecimal('price', 8,2);
            $table->unsignedBigInteger('size');
            $table->unsignedBigInteger('id_brand');
            $table->unsignedBigInteger('id_category');
            $table->unsignedBigInteger('id_style');
            $table->unsignedBigInteger('id_origin');
            $table->boolean('active')->default(1); 
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
                       
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('beers');

    }
}
