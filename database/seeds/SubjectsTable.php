<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\Subject;

class SubjectsTable extends Seeder{

    public function run(){

        Subject::create(['name' => 'ACCOUNTANCY']);
        Subject::create(['name' => 'ARCHITECTURE']);
        Subject::create(['name' => 'COMMERCE']);
        Subject::create(['name' => 'COMPUTER SCIENCE AND TECHNOLOGY']);
        Subject::create(['name' => 'ELECTRONICS AND COMMUNICATION']);
    }
}
