<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderdtFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('orderdt', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('orderdt', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('beers');
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
        Schema::table('orderdt', function (Blueprint $table) {
            $table->dropForeign('orderdt_user_id_foreign');
            $table->dropForeign('orderdt_product_id_foreign');
        });   

    }
}
