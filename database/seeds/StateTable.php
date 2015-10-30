<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\State;

class StateTable extends Seeder{

    public function run(){

        State::create(['name' => 'Andaman and Nicobar (AN)']);
        State::create(['name' => 'Andhra Pradesh (AP)']);
        State::create(['name' => 'Arunachal Pradesh (AR)']);
        State::create(['name' => 'Assam (AS)']);
    }
}
