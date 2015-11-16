<?php
namespace employment_bank\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Employer extends Model implements AuthenticatableContract, CanResetPasswordContract{

    use Authenticatable, CanResetPassword;
    protected $table    = 'employers';
    protected $guarded  = ['_token', 'name'];
    protected $hidden   = ['password', 'remember_token'];

    public static $rules = [
        'organization_name' => 'required|between:3,100',
        'contact_mobile_no'=> 'required|digits:10|numeric|unique:employers,contact_mobile_no',
        'organisation_email'=> 'email|required|max:100|unique:employers,organisation_email',
        'contact_email'   =>  'email|required|max:255|unique:employers,contact_email',
        'web_address'     =>  'url',
        'address'       =>  'required|max:255',
        'password'=> 'confirmed|required',
    ];

    public static $messages = [
        'organization_name.between' => 'fullname must be atleast minimum 3 characters',
        'contact_mobile_no.numeric' => 'Mobile No can only contain numbers',
        'password.confirmed' => 'Password and Confirm Password does not match',
        'web_address.url' =>  'the Web Address field is not valid. Please ensure that you have added http:// at the begining'
    ];
    protected $fillable = ['organization_name', 'organization_type', 'organization_sector', 'industry_id', 'address',
     'state_id', 'district_id', 'pincode','phone_no_ext','phone_no_main','organisation_email','web_address','organisation_idproof',
    'organisation_profile', 'organisation_pancard', 'contact_name', 'contact_designation', 'contact_mobile_no', 'contact_email',
    'password', 'status', 'confirmation_code', 'details', 'photo', 'tagline','web_address', 'temp_enrollment_no'];

    public static $organization_type_options = ['Placement Agency'=>'Placement Agency', 'Employer'=>'Employer', 'Govt Training Providing Organisation'=>'Govt Training Providing Organisation'];

    public static $organization_sector_options = [
          'Private'     =>  'Private',
          'Central Govt'=>  'Central Govt',
          'State Govt'  =>  'State Govt',
          'Central PSU' =>  'Central PSU',
          'State PSU'   =>  'State PSU',
          'Local Bodies'=>  'Local Bodies',
          'Statutory Bodies'  =>  'Statutory Bodies',
          'Others'      =>  'Others'
    ];

    public function industry(){
          //return $this->hasMany('employment_bank\Models\CandidateEduDetails', 'candidate_id');
          return $this->belongsTo('employment_bank\Models\IndustryType', 'industry_id');
    }
                  //getJobStatusAttribute
    public function getEmployerEnrollmentAttribute()
    {
        //if(starts_with($this->temp_enrollment_no, 'TMP_EMP')){
        if($this->verified_by == 0){
          return $this->temp_enrollment_no;
        }else{
          return $this->enrollment_no;
        }
    }

    public function getVerificationStatusAttribute(){

        $user_name = '';
        if($this->verified_by == 0)
          return 'Not Verified';
        else{
          try{
              $admin = Admin::findOrFail($this->verified_by);
              $user_name = $admin->fullname;

          }catch(ModelNotFoundException $e){
              //dd(get_class_methods($e)) // lists all available methods for exception object
              //dd($e)
          }
          
          return 'Verified by '.$user_name;
        }
    }

    public function state(){
      return $this->belongsTo('employment_bank\Models\State', 'state_id');
    }

    public function district(){
      return $this->belongsTo('employment_bank\Models\District', 'district_id');
    }

    protected function setWebAddressAttribute($value){
      $this->attributes['web_address'] = ($value == 'http://www.')? '' : $value;
    }

    public function documents()
    {
        return $this->hasMany('employment_bank\Models\EmployerDocument');
    }
}
