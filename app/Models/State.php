<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model{

    protected $table = "master_states";
    public static $rules = [
      'name' => 'required|unique:master_states,name,:id',
    ];

    protected $guarded = ['id', '_token'];
    protected $fillable = ['name'];
    public $timestamps = false;
}
