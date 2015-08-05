<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Language extends Model{

      protected $table  =   'master_languages';
      public static $rules = [
        'name' => 'required|min:2|max:50|unique:master_languages,name,:id',
      ];

      protected $guarded = ['id', '_token', '_method'];
      protected $fillable = ['name', 'status'];

      protected function setNameAttribute($value){
          $this->attributes['name'] = Str::upper($value);
      }
    }
