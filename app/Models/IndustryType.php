<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class IndustryType extends Model{

    protected $table  =   'master_industry_types';

    public static $rules = [
      'name' => 'required|unique:master_industry_types',
    ];

    protected $guarded = ['id', '_token'];
    protected $fillable = ['name', 'status','description'];
    //public $timestamps = false;

    protected function setNameAttribute($value){
        $this->attributes['name'] = Str::upper($value);
    }
}
