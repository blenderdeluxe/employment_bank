<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateExpDetails extends Model{

    protected $table = 'candidate_experience_details';
    protected $guarded = ['_method', 'token'];
    public static $rules  = [
        //'candidate_id' => 'required' ,
        'employers_name'  =>  'required|max:50',
        'post_held'       =>  'required|max:50',
        'year_experience' =>  'numeric|max:99',
        'salary'          =>  'required|numeric',
        'experience_id'   => 'required|exists,master_subjects,id',
        'industry_id'     => 'required|exists,master_industry_types,id',
    ];
}
