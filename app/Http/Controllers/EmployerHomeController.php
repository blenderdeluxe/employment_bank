<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use employment_bank\Models\Employer;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect, Auth, Validator;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;

use employment_bank\Models\Candidate;
use employment_bank\Models\CandidateInfo;
use employment_bank\Models\CandidateEduDetails;
use employment_bank\Models\CandidateExpDetails;
use employment_bank\Models\CandidateLanguageInfo;
use employment_bank\Models\PostedJob;
use employment_bank\Models\District;

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

            //$confirmation_code = Str::quickRandom(30);
            $confirmation_code = '12345';
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

    public function createJob(FormBuilder $formBuilder){

        $form = $formBuilder->create('employment_bank\Forms\JobCreateForm', [
             'method' => 'POST',
             'url' => route($this->route.'create_job')
        ])->remove('update');
        //return "JOBCREATE FORM";
        return view($this->content.'job.create',compact('form'));
    }

    //PostedJob
    public function storeJob(Request $request){

        $validator = Validator::make($data = $request->all(), PostedJob::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        $data['created_by'] = Auth::employer()->get()->id;
        //$data['emp_job_id'] = '';

        PostedJob::create($data);
        return Redirect::route($this->route.'list_job')->with('message', 'New Job has been Posted!');
    }

    public function listJobs(){

        $results = PostedJob::with('industry')->paginate(20);
        return view($this->content.'job.index', compact('results'));
    }

    public function editJob($id, FormBuilder $formBuilder){

        $result  = PostedJob::findOrFail($id);
        //$districts = District::where('state_id', $result->place_of_employment_district_id);
        $form    = $formBuilder->create('employment_bank\Forms\JobCreateForm', [
             'method' => 'PUT',
            'model' => $result,
            'url' => route($this->route.'update_job', $id)
       ])->remove('save');

       return view($this->content.'job.edit', compact('form'));
    }

    public function updateJob(Request $request, $id){

        $model = PostedJob::findOrFail($id);
        $rules = str_replace(':id', $id, PostedJob::$rules);
        $validator = Validator::make($data = $request->all(), PostedJob::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        $model->update($data);

        return Redirect::route($this->route.'list_job')->with('alert-success', 'Data has been Updated!');
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
