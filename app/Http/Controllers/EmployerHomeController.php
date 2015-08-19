<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator;
use employment_bank\Models\Employer;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;

use employment_bank\Models\Candidate;
use employment_bank\Models\CandidateInfo;
use employment_bank\Models\CandidateEduDetails;
use employment_bank\Models\CandidateExpDetails;
use employment_bank\Models\CandidateLanguageInfo;

class EmployerHomeController extends Controller{

    private $content  = 'employer.';
    private $route  = 'employer.';

    public function showRegister(FormBuilder $formBuilder){

        $form = $formBuilder->create('employment_bank\Forms\EmployerForm', [
             'method' => 'POST',
             'url' => route($this->route.'register')
        ])->remove('save')->remove('update');

        return view($this->content.'register', compact('form'));
    }

    public function doRegister(Request $request){

        $validator = Validator::make($data = $request->all(), Employer::$rules, Employer::$messages);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        if ($validator->passes()){

            $confirmation_code = Str::quickRandom(30);
        		$employer = new Employer;
            $employer->fill($data);
        		//$employer->fullname = ucwords($request->fullname);
          	$employer->password = bcrypt($request->password);
          	$employer->confirmation_code = $confirmation_code;

      		//Basehelper::sendSMS($request->mobile_no, 'Hello '.$request->username.', you have successfully registere. Your username is '.$request->username.' and password is '.$request->password);

        	if(!$employer->save())
  	  		   return Redirect::back()->with('message', 'Error while creating your account!<br> Please contact Technical Support');

  	  	  return Redirect::route('employer.login')->with('message', 'Employer Account has been created!<br>Now Check your email address to verify your account by checking your spam folder or inboxes for verification link after that you can login');
      	  	//sendConfirmation() Will go the email and sms as needed

        }else{

      		return Redirect::back()->withInput()
                	->withErrors($validation);
                // ->with('message', 'There were validation errors.');
        }
    }

    public function showHome(){
        //return view($this->content.'dashboard');
        return view($this->content.'layouts.default');
    }

    public function createJob(){

        //return "JOBCREATE FORM";
        return view($this->content.'create_job');
    }

    public function applications_recieved(){

        $results = CandidateInfo::join('candidates', 'candidate_infos.candidate_id', '=', 'candidates.id')
                ->where('candidates.verified_status', 'Not Verified')
                ->where('candidate_infos.index_card_no', '!=', 'NULL')
                ->orWhere('candidate_infos.index_card_no', '!=', '')
                ->get();

        return view($this->content.'applications.recieved', compact('results'));
    }
}
