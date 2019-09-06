<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeersParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creo tabla de brands
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255) ;          
        });

        //creo tabla de styles
        Schema::create('styles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255) ;          
        });

        //creo tabla de origins
        Schema::create('origins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country', 255) ;          
        });

        //creo tabla de sizes
        Schema::create('sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255) ;          
            $table->unsignedInteger('min') ;          
            $table->unsignedInteger('max') ;          
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
        Schema::dropIfExists('brands');
        Schema::dropIfExists('styles');
        Schema::dropIfExists('origins');
        Schema::dropIfExists('sizes');
    }
}
