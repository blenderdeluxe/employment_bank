<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model{

      protected $table = 'master_districts';
      public static $rules = [
        'name' => 'required|unique:master_districts,name,:id',
      ];

      protected $guarded = ['id', '_token'];
      protected $fillable = ['name', 'state_id'];
      public $timestamps = false;

      public function state(){
          return $this->belongsTo('employment_bank\Models\State', 'state_id');
      }
}
