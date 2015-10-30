<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateLanguageInfos extends Migration{

    public function up(){

      Schema::create('candidate_language_infos', function(Blueprint $table){
          $table->increments('id');
          $table->integer('candidate_id', false, true);
          $table->integer('language_id', false, true);
          $table->enum('can_read', ['YES', 'NO'])->default('NO')->comment('language the candidate can read?');
          $table->enum('can_write', ['YES', 'NO'])->default('NO')->comment('if the language the candidate can write');
          $table->enum('can_speak', ['YES', 'NO'])->default('NO')->comment('if the language the candidate can Speak?');
          $table->enum('can_speak_fluently', ['YES', 'NO'])->default('NO')->comment('if the language the candidate can Speak Fluently?');
          $table->timestamps();
          $table->foreign('candidate_id')->references('id')->on('candidates');
          $table->foreign('language_id')->references('id')->on('master_languages');
      });
  }

  public function down(){

      Schema::dropIfExists('candidate_language_infos');
  }
}
