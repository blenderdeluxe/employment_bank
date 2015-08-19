<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterExamPassedTable extends Migration{

      public function up(){

          Schema::create('master_exams', function(Blueprint $table){
              $table->increments('id');
              $table->string('name');
              $table->enum('exam_category', ['x1', 'x2','x3','other'])->default('other')->comment('Exam type for categorizing the candidate based on 10 or 10+2 or 10+3');
              $table->tinyInteger('status')->default(1)->comment('Only active entries will be listed on the public end');
              $table->string('description')->nullable();
              $table->timestamps();
          });
      }


      public function down(){

          Schema::dropIfExists('master_exams');
      }
}
