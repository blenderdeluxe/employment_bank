<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model{

      protected $table  =   'master_exams';
      public static $rules = [
        'name' => 'required|min:2|max:255|unique:master_exams,name,:id',
        'exam_category' =>  'required|in:x1,x2,x3,other',
        'description'   =>  'max:255',
      ];

      protected $guarded = ['id', '_token', '_method'];
      protected $fillable = ['name', 'exam_category', 'status', 'description'];
      public static $exam_exam_categories = ['x1'=>'x1', 'x2'=>'x2', 'x3'=>'x3', 'other'=>'other'];
      //$exam_exam_categories
      //i have declared all the types i.e. enum values rather then querrying to reduce the db load

}
