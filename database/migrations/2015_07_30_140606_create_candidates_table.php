<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */

   public function up(){

      Schema::create('candidates', function (Blueprint $table) {
          $table->increments('id');
          $table->string('email')->unique();
          $table->string('mobile_no', 10)->unique();
          $table->string('password', 60);
          $table->string('firstname', 30);
          $table->string('lastname', 30)->nullable();
          $table->tinyInteger('status');
			    //$table->enum('active', ['YES', 'NO'])->default('NO');
          $table->string('confirmation_code', 10)->nullable();
          $table->rememberToken();
          $table->timestamps();
      });
    }

    public function down(){
        Schema::drop('candidates');
    }
}
