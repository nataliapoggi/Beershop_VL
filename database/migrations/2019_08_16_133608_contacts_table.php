<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255) ;
            $table->string('lname', 255) ;
            $table->string('email', 255) ;
            $table->string('comment', 255) ;
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->boolean('answered')->default(0);
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
        Schema::dropIfExists('contacts');
    }
}
