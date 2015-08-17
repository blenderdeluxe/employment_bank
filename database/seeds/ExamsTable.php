<?php

use Illuminate\Database\Seeder;
use employment_bank\Models\Exam;

class ExamsTable extends Seeder{

    public function run(){

        Exam::create(['name' => 'Below class VIII', 'exam_category' => 'x1']);
        Exam::create(['name' => 'VIII / middle pass', 'exam_category' => 'x1']);
        Exam::create(['name' => 'VIII (Vocational)', 'exam_category' => 'x1']);
        Exam::create(['name' => 'X / Matric Pass', 'exam_category' => 'x1']);
        Exam::create(['name' => 'X  (Vocational)', 'exam_category' => 'x1']);
        Exam::create(['name' => '(10 +2) Arts', 'exam_category' => 'x2']);
        Exam::create(['name' => '(10+2 ) Commerce', 'exam_category' => 'x2']);
        Exam::create(['name' => '(10+2) Science', 'exam_category' => 'x2']);
        Exam::create(['name' => 'Graduate (Pass)-Arts', 'exam_category' => 'x3']);
        Exam::create(['name' => 'Graduate (Pass)-Science', 'exam_category' => 'x3']);
        Exam::create(['name' => 'Graduate (Pass)- Commerce', 'exam_category' => 'x3']);
    }
}
