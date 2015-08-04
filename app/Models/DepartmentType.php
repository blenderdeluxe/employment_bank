<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DepartmentType extends Model{

  protected $table  =   'master_department_types';

  public static $rules = [
    'name' => 'required|min:2|max:255|unique:master_department_types,name,:id',
  ];

  protected $guarded = ['id', '_token'];
  protected $fillable = ['name', 'status','description'];
  //public $timestamps = false;

  protected function setNameAttribute($value){
      $this->attributes['name'] = Str::upper($value);
  }
}
