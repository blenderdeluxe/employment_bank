<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subject extends Model{

    protected $table  =   'master_subjects';
    public static $rules = [
      'name' => 'required|min:2|max:255|unique:master_subjects,name,:id',
      'description'   =>  'max:255',
    ];

    protected $guarded = ['id', '_token', '_method'];
    protected $fillable = ['name', 'status', 'description'];

    protected function setNameAttribute($value){
        $this->attributes['name'] = Str::upper($value);
    }
  }
