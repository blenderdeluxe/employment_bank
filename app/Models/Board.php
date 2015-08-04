<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model{

      protected $table  =   'master_boards';
      public static $rules = [
        'name' => 'required|min:2|max:255|unique:master_boards,name,:id',
        'description' =>  'max:255',
      ];

      protected $guarded = ['id', '_token', '_method'];
      protected $fillable = ['name', 'status', 'description'];
    }
