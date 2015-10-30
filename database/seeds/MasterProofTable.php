<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\MasterProof;

class MasterProofTable extends Seeder{

    public function run(){

        MasterProof::create(['name' => 'Ration Card']);
        MasterProof::create(['name' => 'Voter ID Card']);
        MasterProof::create(['name' => 'Passport']);
    }
}
