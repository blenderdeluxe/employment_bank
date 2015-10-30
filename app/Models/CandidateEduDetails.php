<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateEduDetails extends Model{

    protected $table = 'candidate_edu_details';
    protected $guarded = ['_method', 'token'];
    public static $rules  = [
        //'candidate_id' => 'required' ,
        'exam_id'     => 'required|exists,master_exams,id',
        'board_id'    => 'required|exists,master_boards,id',
        'subject_id'  => 'sometimes',
        'specialization'  =>  'required|max:50',
        'pass_year'  =>  'required|numeric',
        'percentage'  =>  'required|numeric'
    ];
}
