<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class PostedJob extends Model implements SluggableInterface{

      use SluggableTrait;  
      protected $sluggable = [
        'build_from' => ['seo_url', 'district.name', 'exam.name']
        //'build_from' => 'seo'
      ];

      public function getSeoUrlAttribute($value='')
      {
        return $this->post_name.' at '.$this->employer->organization_name.' '.$this->subject->name;
      }

      protected $table  =   'posted_jobs';
      public static $rules = [
          'post_name' => 'required|min:3|max:255',
          'no_of_post' =>  'required|numeric|digits_between:1,8',
          'preferred_age_min' => 'integer|min:15|max:70',
          //'preferred_age_max' => 'integer|min:0|max:100',
          'preferred_age_max' => 'integer|min:0|max:100',
          //'phone_no_ext' => 'max:',
          //'preferred_age_max' => 'integer|min:0|max:100',
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
      public function employer(){
          //return $this->hasMany('employment_bank\Models\CandidateEduDetails', 'candidate_id');
          return $this->belongsTo('employment_bank\Models\Employer', 'created_by');
      }

      public function district(){
          //return $this->hasMany('employment_bank\Models\CandidateEduDetails', 'candidate_id');
          return $this->belongsTo('employment_bank\Models\District', 'place_of_employment_district_id');
      }

      public function state(){
          //return $this->hasMany('employment_bank\Models\CandidateEduDetails', 'candidate_id');
          return $this->belongsTo('employment_bank\Models\State', 'place_of_employment_state_id');
      }

      public function exam(){
          //return $this->hasMany('employment_bank\Models\CandidateEduDetails', 'candidate_id');
          return $this->belongsTo('employment_bank\Models\Exam', 'exam_passed_id');
      }

      public function subject(){
          //return $this->hasMany('employment_bank\Models\CandidateEduDetails', 'candidate_id');
          return $this->belongsTo('employment_bank\Models\Subject', 'subject_id');
      }
      //place_of_employment_state_id

      public function getPhysicalHeightAttribute($value)
      {
        return $this->attributes['physical_height'] = ($value == 0.00) ? '' : $value;
      }

      public function getPhysicalWeightAttribute($value)
      {
        return $this->attributes['physical_weight'] = ($value == 0.00) ? '' : $value;
      }

      public function getPhysicalChestAttribute($value)
      {
        return $this->attributes['physical_chest'] = ($value == 0.00) ? '' : $value;
      }

      public function getPreferredExperienceAttribute($value)
      {
        return $this->attributes['preferred_experience'] = ($value == 0) ? '' : $value;
      }

      public function getOtherBenefitsAttribute($value)
      {
        return $this->attributes['other_benefits'] = ($value == 0) ? '' : $value;
      }     


}
