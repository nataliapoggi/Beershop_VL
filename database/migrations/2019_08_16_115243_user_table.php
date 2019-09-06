<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // add missing columns
        Schema::table('users', function (Blueprint $table) {
                $table->string('lname',255)->after('name')->charset('utf8');
                $table->date('bdate')->after('password');
                $table->unsigendTinyInt('is_admin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['lname', 'bdate', 'is_admin']);
        });
    }
}
