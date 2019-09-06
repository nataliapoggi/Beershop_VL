<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeersTableFkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('beers', function (Blueprint $table) {
            $table->foreign('id_brand')->references('id')->on('brands');
        });

        Schema::table('beers', function (Blueprint $table) {
            $table->foreign('id_category')->references('id')->on('categories');
        });

        Schema::table('beers', function (Blueprint $table) {
            $table->foreign('id_style')->references('id')->on('styles');
        });

        Schema::table('beers', function (Blueprint $table) {
            $table->foreign('id_origin')->references('id')->on('origins');
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
        Schema::table('beers', function (Blueprint $table) {
            $table->dropForeign('beers_id_brand_foreign');
            $table->dropForeign('beers_id_category_foreign');
            $table->dropForeign('beers_id_style_foreign');
            $table->dropForeign('beers_id_origin_foreign');
        });   
    }
}
