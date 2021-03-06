<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostedJob extends Model implements SluggableInterface{

      use SluggableTrait;
      use SoftDeletes;

      protected $dates = ['deleted_at'];  //for mutator for softdelete fields
      protected $sluggable = [
        'build_from' => ['seo_url', 'district.name', 'exam.name'],
        'save_to'    => 'slug',
        'unique'     => true
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
          'preferred_age_min' => 'integer|min:15|max:80',
          //'preferred_age_max' => 'integer|min:0|max:100',
          'preferred_age_max' => 'integer|greater_than_field:preferred_age_min|max:100',
          'salary_offered_min' => 'required|numeric',
          'salary_offered_max' => 'required|numeric|greater_than_field:salary_offered_min',
          'subject_id'  =>  'required|exists:master_subjects,id',
          'job_sub_category' => 'required'
          //'phone_no_ext' => 'max:',
          //'preferred_age_max' => 'integer|min:0|max:100',
          //'industry_id'   =>  'required|exists,master_industry_types,id',
      ];

      public static $messages = ['subject_id.required' => 'The Subject field is required'];

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

      public function getJobStatusAttribute($value)
      {
        if($this->attributes['status'] == 0)
          return '<span class="label label-warning"> Unpublished </span>';

        if($this->attributes['status'] == 1)
          return '<span class="label label-success"> Active </span>';
      
        if($this->attributes['status'] == 2)
          return '<span class="label label-danger"> Filled Up </span>';
      }    


}
