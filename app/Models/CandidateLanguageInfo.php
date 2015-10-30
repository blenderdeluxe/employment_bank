<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateLanguageInfo extends Model{

    protected $table = 'candidate_language_infos';
    protected $guarded = ['_method', 'token'];
    public static $rules  = [
        //'candidate_id' => 'required' ,
        'language_id'     => 'required|exists,master_languages,id',
        'can_read'        =>  'required|in:YES,NO',
        'can_write'       =>  'required|in:YES,NO',
        'can_speak'       =>  'required|in:YES,NO',
        'can_speak_fluently'=>  'required|in:YES,NO',
    ];
}
