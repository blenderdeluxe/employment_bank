<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MasterCasts extends Migration{

      public function up(){

        Schema::create('master_casts', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 50);
        });
      }

      public function down(){

          Schema::dropIfExists('master_casts');
      }
}
