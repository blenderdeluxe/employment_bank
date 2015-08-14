<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateInfos extends Migration{

        public function up(){

            Schema::create('candidate_infos', function(Blueprint $table){
                $table->increments('id');
                $table->integer('candidate_id', false, true);
                $table->string('fullname', 50);
                $table->string('guar_name', 50)->nullable();
                $table->string('spouse_name', 50)->nullable();
                $table->string('index_card_no', 100)->unique();

                $table->enum('sex', ['MALE', 'FEMALE','OTHERS'])->comment('gender');
                $table->integer('caste_id', false, true)->comment('Candidate caste/obc etc');
                $table->enum('religion', ['BUDDISM', 'CHRISTIANITY','HINDUISM','ISLAM','JAINISM','PARSI','SIKHISM', 'OTHERS']);
                $table->enum('marital_status', ['UNMARRIED', 'MARRIED','DIVORCEE','WIDOW'])->default('UNMARRIED');
                $table->date('dob')->comment('Date of birth');
                $table->enum('physical_challenge', ['YES', 'NO'])->default('NO')->comment('Whether Physically Challenged ?');
                $table->enum('ex_service', ['YES', 'NO'])->default('NO')->comment('Whether Ex-serviceman');
                $table->string('address')->nullable();
                $table->integer('state_id', false)->nullable()->unsigned()->comment('State now only for arunachal');
                $table->integer('district_id', false)->nullable()->unsigned()->comment('District foriegn key');
                $table->integer('pincode', false)->nullable();
                //Physical Measurement
                $table->decimal('physical_height', 3, 2)->nullable()->comment('in cm');
                $table->decimal('physical_weight', 3, 2)->nullable()->comment('in k.g.');
                $table->decimal('physical_chest', 3, 2)->nullable()->comment('Measurement in cm');
                $table->string('photo_url', 200)->nullable()->comment('Photo URL');
                $table->string('cv_url', 200)->nullable()->comment('CV URL');
                //Additional Information :
                $table->integer('proof_details_id', false, true)->comment('Proof of Residence');
                $table->string('proof_no', 100)->nullable()->comment('Residence Proof/Id No');
                $table->enum('relocated', ['No', 'Within State', 'Within Country', 'Outside Country'])->default('No')->comment('Willing to Relocate :');
                $table->enum('bpl', ['YES', 'NO'])->default('NO')->comment('Whether BPL');
                $table->string('adhaar_no', 100)->nullable()->comment('Aadhaar No');
                $table->string('additional_info')->nullable()->comment('Additional Information');
                $table->timestamps();
                $table->foreign('candidate_id')->references('id')->on('candidates');
                $table->foreign('caste_id')->references('id')->on('master_casts');
                $table->foreign('state_id')->references('id')->on('master_states');
                $table->foreign('district_id')->references('id')->on('master_districts');
            });
        }

        public function down(){

            Schema::dropIfExists('candidate_infos');
        }
  }
