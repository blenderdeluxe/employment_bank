<?php
namespace employment_bank\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Admin extends Model implements AuthenticatableContract, CanResetPasswordContract{

    use Authenticatable, CanResetPassword;
    protected $table    = 'admins';
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
    //
}
