<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('mobile_no', 10)->unique();
            $table->string('password', 60);
            $table->string('fullname', 100);
            //$table->string('lastname', 30)->nullable();
            $table->tinyInteger('status');
            $table->string('confirmation_code', 10)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('admins');
    }
}
