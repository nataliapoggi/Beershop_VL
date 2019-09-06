<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderaddFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('orderadd', function (Blueprint $table) {
            $table->foreign('order_id')->references('order_id')->on('orderhd');
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
        Schema::table('orderadd', function (Blueprint $table) {
            $table->dropForeign('orderpay_order_id_foreign');
        }); 
    }
}
