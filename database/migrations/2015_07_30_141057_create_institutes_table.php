<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutesTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('institutes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            //$table->string('mobile_no', 10)->unique();
            $table->string('password', 60);
            $table->string('name');
            $table->string('address')->nullable();
            $table->tinyInteger('status');
            //$table->enum('active', ['YES', 'NO'])->default('NO');
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
        Schema::drop('institutes');
    }
}
