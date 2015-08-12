<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class MasterProof extends Model{

    protected $table = "master_proof_details";
    public static $rules = [
      'name' => 'required|max:255|unique:master_proof_details,name,:id',
      'details' =>  'max:255'
    ];

    protected $guarded = ['id', '_token'];
    protected $fillable = ['name', 'details'];
    public $timestamps = false;
}
