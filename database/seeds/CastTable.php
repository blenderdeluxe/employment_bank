<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\Caste;

class CastTable extends Seeder{

    public function run(){

        Caste::create(['name' => 'GENERAL']);
        Caste::create(['name' => 'OBC']);
        Caste::create(['name' => 'OBC\'A\'']);
        Caste::create(['name' => 'OBC\'B\'']);
        Caste::create(['name' => 'SCHEDULED CASTE']);
        Caste::create(['name' => 'SCHEDULED TRIBE']);
    }
}
