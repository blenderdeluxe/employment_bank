<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateExperienceInfos extends Migration{

    public function up(){

        Schema::create('candidate_experience_details', function(Blueprint $table){
            $table->increments('id');
            $table->integer('candidate_id', false, true);
            $table->string('employers_name', 50)->nullable()->comment('Name of the Employer or Company');
            $table->string('post_held', 50)->nullable()->comment('Position held');
            $table->integer('year_experience', false)->nullable()->comment('Years of experience');
            $table->integer('salary', false)->nullable()->comment('Salary');
            $table->integer('experience_id', false, true)->comment('This will be the foreign key for subjects/trade');
            $table->integer('industry_id', false, true)->comment('This will be the foreign key for Industry/Sector');
            $table->timestamps();
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->foreign('experience_id')->references('id')->on('master_subjects');
            $table->foreign('industry_id')->references('id')->on('master_industry_types');
            //$table->foreign('subject_id')->references('id')->on('master_subjects');
        });
    }

    public function down(){

        Schema::dropIfExists('candidate_experience_details');
    }
}
