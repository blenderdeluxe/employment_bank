<?php

namespace employment_bank\Models;

use Illuminate\Database\Eloquent\Model;

class EmployerDocument extends Model{

      //protected $table = 'employer_documents';
      public static $rules = [
        'doc_type'  =>  'required|in:pan_card,company_firm_rc,trade_license,govt_dept_rc,others',
        'document'   =>  'required|mimes:jpg,jpeg,png,bmp,wbmp|max:512',
        'description' =>  'max:240'
      ];

      protected $guarded = ['id', '_token', '_method'];
      protected $fillable = ['employer_id', 'doc_type','doc_url','description'];

}
