<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration{

      public function up(){

          Schema::create('employers', function (Blueprint $table) {
              $table->increments('id');
              $table->string('organization_name')->comment('Organization Name');
              $table->enum('organization_type', ['Placement Agency', 'Employer', 'Govt Training Providing Organisation']);
              $table->enum('organization_sector', ['Private', 'Central Govt', 'State Govt','Central PSU','State PSU','Local Bodies','Statutory Bodies','Others'])->comment('Organisation Sector *');
              $table->integer('industry_id', false, true)->comment('Foregn key for master_industry types');
              $table->string('photo', 200)->nullable()->default('uploads/employers/default.png')->comment('Photo URL');
              $table->string('tagline', 100)->nullable()->comment('Company Tagline');
              $table->string('details', 500)->nullable()->comment('Company Details');
              $table->string('address')->nullable();
              $table->integer('state_id', false, true);
              $table->integer('district_id', false, true);
              $table->integer('pincode', false)->nullable();
              $table->string('phone_no_ext', 5)->nullable();
              $table->string('phone_no_main', 10)->nullable();
              $table->string('organisation_email', 100)->unique();
              $table->string('web_address')->nullable();
              $table->string('organisation_idproof')->nullable();
              $table->string('organisation_profile')->nullable();
              $table->string('organisation_pancard')->nullable();
              //Contact person details or login
              $table->string('contact_name', 50)->comment('Contact Person Name');
              $table->string('contact_designation', 50)->comment('Contact Person Designation');
              $table->string('contact_mobile_no', 10)->unique();
              $table->string('contact_email')->unique();
              $table->string('password', 60);
              $table->tinyInteger('status');
              $table->string('confirmation_code', 10)->nullable();
              $table->rememberToken();
              $table->timestamps();
              $table->foreign('industry_id')->references('id')->on('master_industry_types');
              $table->foreign('state_id')->references('id')->on('master_states');
              $table->foreign('district_id')->references('id')->on('master_districts');
          });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('employers');
    }
}
