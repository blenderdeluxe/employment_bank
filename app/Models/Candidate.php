<?php
namespace employment_bank\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Candidate extends Model implements AuthenticatableContract, CanResetPasswordContract{

    use Authenticatable, CanResetPassword;
    protected $table    = 'candidates';
    protected $guarded  = ['_token', 'name'];
    protected $hidden   = ['password', 'remember_token'];

    public static $rules = [
        //'fullname' => 'required|between:3,55',
        //'username'=> 'required|min:3|regex:/^[\pL\s]+$/u|unique:candidates,username',
        'username'=> 'required|min:3|alpha_spaces|unique:candidates,username',
        'mobile_no'=> 'required|digits:10|numeric|unique:candidates,mobile_no',
        'email'=> 'email|required|max:100|unique:candidates,email',
        'password'=> 'confirmed|required',
    ];

    public static $messages = [
        'username.min' => 'Username must be atleast minimum 3 characters',
        'mobile_no.numeric' => 'Mobile No can only contain numbers',
        'password.confirmed' => 'Password and Confirm Password does not match',
    ];

    protected $fillable = ['username', 'fullname', 'mobile_no', 'email', 'password', 'reset_key', 'status', 'confirmation_code'];

    public function bio(){

        return $this->hasOne('employment_bank\Models\CandidateInfo', 'candidate_id');
    }

    public function education(){

        return $this->hasMany('employment_bank\Models\CandidateEduDetails', 'candidate_id');
        //returns $this->hasMany('Photo')->where('photos.type', '=', 'Cars');
    }
    public function experience(){
        return $this->hasMany('employment_bank\Models\CandidateExpDetails', 'candidate_id');
    }
    public function language(){
        return $this->hasMany('employment_bank\Models\CandidateLanguageInfo', 'candidate_id');
    }


}
