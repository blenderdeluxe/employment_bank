<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\Board;

class BoardsTable extends Seeder{

    public function run(){

        Board::create(['name' => 'AICTE']);
        Board::create(['name' => 'CISCO']);
        Board::create(['name' => 'IGNOU']);
        Board::create(['name' => 'IIT']);
        Board::create(['name' => 'National Institute of Open School']);
        Board::create(['name' => 'Guwahati University']);
        Board::create(['name' => 'RED HAT']);
        Board::create(['name' => 'MICROSOFT']);
    }
}
