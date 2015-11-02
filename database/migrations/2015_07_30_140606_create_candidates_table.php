<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration{

   public function up(){

      Schema::create('candidates', function (Blueprint $table) {
          $table->increments('id');
          $table->string('username')->unique();
          $table->string('email')->unique();
          $table->string('mobile_no', 10)->unique();
          $table->string('password', 60);
          $table->string('fullname', 50)->nullable();
          $table->tinyInteger('status');
          $table->string('confirmation_code', 100)->nullable();
          $table->enum('verified_status', ['Verified', 'Not Verified', 'Halted'])->default('Not Verified');
          $table->integer('verified_by', false)->unsigned()->default('0')->comment('verified by whom admin');
          $table->rememberToken();
          $table->timestamps();
      });
    }

    public function down(){
        Schema::drop('candidates');
    }
}
