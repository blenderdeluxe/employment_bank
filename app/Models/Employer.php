<?php
namespace employment_bank\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Employer extends Model implements AuthenticatableContract, CanResetPasswordContract{

    use Authenticatable, CanResetPassword;
    protected $table    = 'employers';
    protected $guarded  = ['_token', 'name'];
    protected $hidden   = ['password', 'remember_token'];

    public static $rules = [
        'fullname' => 'required|between:3,100',
        'mobile_no'=> 'required|digits:10|numeric|unique:admins,mobile_no',
        'email'=> 'email|required|max:100|unique:admins,email',
        'password'=> 'confirmed|required',
    ];

    public static $messages = [
        'fullname.min' => 'fullname must be atleast minimum 3 characters',
        'mobile_no.numeric' => 'Mobile No can only contain numbers',
        'password.confirmed' => 'Password and Confirm Password does not match',
    ];
    protected $fillable = ['fullname', 'mobile_no', 'email', 'password', 'reset_key', 'status', 'confirmation_code'];

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
}
