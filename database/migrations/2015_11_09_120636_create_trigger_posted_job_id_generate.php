<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerPostedJobIdGenerate extends Migration
{
     public function up(){

    //     DB::unprepared("
    //     CREATE TRIGGER tr_User_Default_Member_Role BEFORE INSERT ON `ebank_posted_jobs` FOR EACH ROW
    //     BEGIN
    //         declare ap_id varchar(50);
    //         select auto_increment into ap_id from information_schema.TABLES where TABLE_NAME ='ebank_posted_jobs' and TABLE_SCHEMA='employment_bank';

    // set ap_id = CONCAT('EMPJOB-', LPAD(ap_id,7, '0'));
    // SET NEW.appointment_id = ap_id;
    //     END
    //     ");
     }


      public function down() {
    //  {
    //   DB::unprepared('DROP TRIGGER `tr_User_Default_Member_Role`');
      }
}
