<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterDistrictsTable extends Migration{

    public function up()
    {
        Schema::create('master_districts', function(Blueprint $table){
            $table->increments('id');
            $table->integer('state_id', false, true);
            $table->string('name', 100);
            $table->foreign('state_id')->references('id')->on('master_states');
        });
    }
    
  public function down()
    {
        Schema::dropIfExists('master_districts');
    }
}
