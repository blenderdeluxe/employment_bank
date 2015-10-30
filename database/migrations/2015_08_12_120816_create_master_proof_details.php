<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterProofDetails extends Migration{

      public function up(){

          Schema::create('master_proof_details', function(Blueprint $table){
              $table->increments('id');
              $table->string('name', 100);
              $table->string('details')->nullable();
          });
      }

      public function down(){

          Schema::dropIfExists('master_proof_details');
      }
}
