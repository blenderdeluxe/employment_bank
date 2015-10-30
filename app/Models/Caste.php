<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class Caste extends Model{

    protected $table = "master_casts";
    public static $rules = [
      'name' => 'required|unique:master_casts,name,:id',
    ];

    protected $guarded = ['id', '_token'];
    protected $fillable = ['name'];
    public $timestamps = false;

}
