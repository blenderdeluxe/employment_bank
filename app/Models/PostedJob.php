<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class PostedJob extends Model{

      protected $table  =   'posted_jobs';
      public static $rules = [
          'post_name' => 'required|min:3|max:255',
          'no_of_post' =>  'required|numeric',
          //'industry_id'   =>  'required|exists,master_industry_types,id',
      ];

      protected $guarded = ['id', '_token', '_method'];
      //protected $fillable = ['name', 'exam_category', 'status', 'description'];
      //public static $exam_exam_categories = ['x1'=>'x1', 'x2'=>'x2', 'x3'=>'x3', 'other'=>'other'];
      //$exam_exam_categories
      //i have declared all the types i.e. enum values rather then querrying to reduce the db load

      public function industry(){

          //return $this->hasMany('employment_bank\Models\CandidateEduDetails', 'candidate_id');
          return $this->belongsTo('employment_bank\Models\IndustryType', 'industry_id');
      }

}
