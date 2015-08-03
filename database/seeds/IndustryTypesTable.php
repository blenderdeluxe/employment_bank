<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\IndustryType;

class IndustryTypesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IndustryType::create(['name' => 'IT']);
        IndustryType::create(['name' => 'Engineering']);
        IndustryType::create(['name' => 'Electricals']);
        IndustryType::create(['name' => 'Construction']);
        IndustryType::create(['name' => 'Automobiles']);
        IndustryType::create(['name' => 'Printing']);
    }
}
