<?php
namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;

use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;
use Validator, Redirect, DB;
use employment_bank\Models\Candidate;
use employment_bank\Models\District;

class RestController extends Controller{


      public static function getDistricts(Request $request){

	        $id = $request->state_id;
	        return District::where('state_id', $id)->get();
      }

}
