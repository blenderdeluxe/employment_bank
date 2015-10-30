<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\District;

class DistrictTable extends Seeder{

    public function run(){

        District::create(['state_id'=>'3', 'name' => 'Anjaw']);
        District::create(['state_id'=>'3', 'name' => 'Changlang']);
        District::create(['state_id'=>'3', 'name' => 'East Siang']);
        District::create(['state_id'=>'3', 'name' => 'East Kameng']);
        District::create(['state_id'=>'3', 'name' => 'Kurung Kumey']);
        District::create(['state_id'=>'3', 'name' => 'Lohit']);
        District::create(['state_id'=>'3', 'name' => 'Lower Dibang Valley']);
        District::create(['state_id'=>'3', 'name' => 'Lower Subansiri']);
        District::create(['state_id'=>'3', 'name' => 'Papum Pare']);
        District::create(['state_id'=>'3', 'name' => 'Tawang']);
        District::create(['state_id'=>'3', 'name' => 'Tirap']);
        District::create(['state_id'=>'3', 'name' => 'Dibang Valley']);
        District::create(['state_id'=>'3', 'name' => 'Upper Siang']);
        District::create(['state_id'=>'3', 'name' => 'Upper Subansiri']);
        District::create(['state_id'=>'3', 'name' => 'West Kameng']);
        District::create(['state_id'=>'3', 'name' => 'West Siang']);
    }
}
