<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\Language;

class LanguagesTable extends Seeder{

    public function run(){

        Language::create(['name' => 'ENGLISH']);
        Language::create(['name' => 'HINDI']);
        Language::create(['name' => 'ASSAMESE']);
    }
}
