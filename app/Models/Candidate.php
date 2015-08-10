<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model{

    protected $table = 'candidates';
    protected $guarded = ['_token', 'name'];
    protected $hidden = ['password'];

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
    //
}
