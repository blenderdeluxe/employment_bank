<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CandidateInfo extends Model{

  //protected $table  =   'candidate_bios';
  public static $rules = [
      //'candidate_id' =>'exists:members,id',
      'fullname'    =>  'required|min:3|max:50',
      'guar_name'   =>  'required|min:3|max:50',
      'spouse_name' =>  'max:50',
      'sex'         =>  'required|in:MALE,FEMALE,OTHERS',
      'caste_id'    =>  'required|exists:master_casts,id',
      'religion'    =>  'required|in:BUDDISM,CHRISTIANITY,HINDUISM,ISLAM,JAINISM,PARSI,SIKHISM,OTHERS',
      'marital_status'=>'required|in:UNMARRIED,MARRIED,DIVORCEE,WIDOW',
      'dob'         =>  'required|date_format:d-m-Y|before:"now -15 year"',
      'physical_challenge'  =>  'required|in:YES,NO',
      'ex_service'  =>  'required|in:YES,NO',
      'address'     =>  'max:255',
      'state_id'    =>  'required|exists:master_states,id',
      'district_id' =>  'required|exists:master_districts,id',
      'pincode'     =>  'numeric|digits_between:6,6',
      'physical_height'     =>  'numeric',
      'physical_weight'     =>  'numeric',
      'physical_chest'      =>  'numeric',

      'photo_url'           => 'mimes:jpeg,png|max:512',
      'cv_url'              => 'mimes:pdf,doc,docx|max:102400',

      'proof_details_id'    =>  'required|exists:master_proof_details,id',
      'proof_no'            =>  'max:100',
      'relocated'           =>'required|in:No,Within State,Within Country,Outside Country',
      'bpl'                 =>  'required|in:YES,NO',
      'adhaar_no'           =>  'max:100',
      'additional_info'     =>  'max:255',

  ];

  public static $messages = ['dob.before'=> 'Date of Birth must be minimum 15 year old',
      'photo_url.mimes' =>  'The Profile Photo Must be a valid JPG',
      'photo_url.max'   =>  'The Photo size should be maximum of 512KB',
      'cv_url.mimes'    =>  'The CV/Resume must be in any one of the formats as specified (PDF/DOC/DOCX)',
      'cv_url.max'      =>  'The CV/Resume size should be maximum of 1MB or 1024KB',
  ];

  protected $guarded = ['id', '_token'];
  protected $fillable = [ 'candidate_id', 'fullname', 'guar_name','spouse_name','sex','caste_id','religion','marital_status','dob',
  'physical_challenge', 'ex_service', 'address', 'state_id', 'district_id', 'pincode', 'physical_height', 'physical_weight',
  'physical_chest', 'photo_url','cv_url', 'proof_details_id', 'proof_no', 'relocated', 'bpl', 'adhaar_no', 'additional_info'
  ];

  public static $sex_options = ['MALE'=>'MALE', 'FEMALE'=>'FEMALE', 'OTHERS'=>'OTHERS'];

  public static $religion_options = ['BUDDISM'=>'BUDDISM', 'CHRISTIANITY'=>'CHRISTIANITY','HINDUISM'=>'HINDUISM',
    'ISLAM'=>'ISLAM','JAINISM'=>'JAINISM','PARSI'=>'PARSI','SIKHISM'=>'SIKHISM', 'OTHERS'=>'OTHERS'];

  public static $marital_status_options = ['UNMARRIED'=>'UNMARRIED', 'MARRIED'=>'MARRIED', 'DIVORCEE'=>'DIVORCEE','WIDOW'=>'WIDOW'];

  public static $relocated_options = ['No'=>'No', 'Within State'=>'Within State', 'Within Country'=>'Within Country', 'Outside Country'=>'Outside Country'];

  protected function setFullnameAttribute($value){
      $this->attributes['fullname'] = Str::upper($value);
  }

  protected function setSpouseNameAttribute($value){
      $this->attributes['spouse_name'] = Str::upper($value);
  }

  protected function setDobAttribute($value){
      $this->attributes['dob'] = date('Y-m-d', strtotime($value));
  }
  protected function getDobAttribute($value) {
      return $this->attributes['dob'] = date('d-m-Y', strtotime($value) );
  }

  protected function setGuarNameAttribute($value){
      $this->attributes['guar_name'] = Str::upper($value);
  }

  protected function getPincodeAttribute($value) {
      return $this->attributes['pincode'] = ($value=='0')? '': $value;
  }
  protected function getPhysicalHeightAttribute($value) {
      return $this->attributes['physical_height'] = ($value=='0.00')? '': $value;
  }
  protected function getPhysicalWeightAttribute($value) {
      return $this->attributes['physical_weight'] = ($value=='0.00')? '': $value;
  }


  protected function getPhysicalChestAttribute($value) {
      return $this->attributes['physical_chest'] = ($value=='0.00')? '': $value;
  }


}
