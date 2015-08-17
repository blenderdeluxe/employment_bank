<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator, Redirect, DB;;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;

use employment_bank\Models\Exam;
use employment_bank\Models\Board;
use employment_bank\Models\Subject;
use employment_bank\Models\Language;
use employment_bank\Models\IndustryType;
use employment_bank\Models\Candidate;
use employment_bank\Models\CandidateInfo;
use employment_bank\Models\CandidateEduDetails;
use employment_bank\Models\CandidateExpDetails;
use employment_bank\Models\CandidateLanguageInfo;



class CandidateHomeController extends Controller{

    private $content  = 'webfront.candidate.';
    private $route  = 'candidate.';

    public function showRegister(){

      return view($this->content.'register');
    }

    public function doRegister(Request $request){

        $validator = Validator::make($data = $request->all(), Candidate::$rules, Candidate::$messages);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        if ($validator->passes()){

          $confirmation_code = Str::quickRandom(30);
      		$candidate = new Candidate;
      		//$candidate->name = ucwords($request->fullname);
        	$candidate->username = $request->username;
        	$candidate->mobile_no = $request->mobile_no;
        	$candidate->email = $request->email;
        	$candidate->password = bcrypt($request->password);
        	$candidate->confirmation_code = $confirmation_code;

        	$data = ['confirmation_code' => $confirmation_code,
        			 'username' => $request->username,
        			 'password' => $request->password,
        			 'mobile_no' => $request->mobile_no
        	];

      		Basehelper::sendSMS($request->mobile_no, 'Hello '.$request->username.', you have successfully registere. Your username is '.$request->username.' and password is '.$request->password);

    	  	// Mail::send('emails.verify', $data, function($message) use ($candidate, $data){
    	  	// 	$message->from('no-reply@employment_bank', 'Employment Bank');
          //     	$message->to(Input::get('email'), $candidate->name)
          //         	->subject('Verify your email address');
          // });

        	if(!$candidate->save())
  	  		return Redirect::back()->with('message', 'Error while creating your account!<br> Please contact Technical Support');

  	  	  return Redirect::route('candidate.login')->with('message', 'Account has been created!<br>Now Check your email address to verify your account by checking your spam folder or inboxes for verification link after that you can login');
      	  	//sendConfirmation() Will go the email and sms as needed

        }else{

      		return Redirect::back()->withInput()
                	->withErrors($validation);
                // ->with('message', 'There were validation errors.');
        }
    }

    public function showHome(){

        return 'Dashboard';
        //return view($this->content.'dashboard');
    }

    public function createResume(FormBuilder $formBuilder){

        $form = $formBuilder->create('employment_bank\Forms\CandidateInfoForm', [
             'method' => 'POST',
             'url' => route($this->route.'store.resume')
        ])->remove('save')->remove('update');

        return view($this->content.'resume', compact('form'));
    }

    public function storeResume(Request $request){

        $validator = Validator::make($data = $request->all(), CandidateInfo::$rules, CandidateInfo::$messages);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        $data['candidate_id'] = Auth::candidate()->get()->id;
  			$info = CandidateInfo::create($data);

        $files = [];
        //return $data;
        //return $serverFileName = "photo.".$request->photo_url->getClientOriginalExtension();
        //$file = $request->file('cv_url');
        $destination_path = storage_path('candidates/'.$info->id);
        //Verifying File Presence

        if ($request->hasFile('cv_url')) {

            if ($request->file('cv_url')->isValid()){
                $fileName = 'cv.'.$request->file('cv_url')->getClientOriginalExtension();
                $request->file('cv_url')->move($destination_path, $fileName);
            }
        }

        if ($request->hasFile('photo_url')) {

            if ($request->file('photo_url')->isValid()){
                $fileName = 'photo.'.$request->file('photo_url')->getClientOriginalExtension();
                $request->file('photo_url')->move($destination_path, $fileName);
            }
        }


        return Redirect::route($this->route.'index')->with('message', 'Basic Personal/Contact Info  has been Added!');
    }

    public function createEdu_details(FormBuilder $formBuilder){

        $exams = [''=>'-- Select --'] + Exam::lists('name', 'id')->all();
        $boards = [''=>'-- Select --'] + Board::lists('name', 'id')->all();
        $subjects = [''=>'-- Select --'] + Subject::lists('name', 'id')->all();
        $url = $this->route.'store.edu_details';

          // $form = $formBuilder->create('employment_bank\Forms\CandidateEdu_detailsForm', [
          //      'method' => 'POST',
          //      'url' => route($this->route.'store.edu_details')
          // ])->remove('save')->remove('update');

          return view($this->content.'edu_details', compact('exams', 'boards', 'subjects', 'url'));
    }

    public function storeEdu_details(Request $request){

        //$data = $request->all(); ??NO SERVER SIDE VALIDATION HAS BEEN SET BECAUSE even if you set also if we redirect back the user have reinster every details entry
        //$exam_id 	= $request->exam_id;
        //candidate_id
        // 'board_id'    => 'required|exists,master_boards,id',
        // 'subject_id'  => 'sometimes',
        // 'specialization'  =>  'required|max:50',
        // 'pass_year'  =>  'required|numeric',
        // 'percentage'  =>  'required|numeric'
        $candidate_id = Auth::candidate()->get()->id;
        DB::beginTransaction();

        foreach($request->exam_id as $key => $n ){

            $entry = [
                'candidate_id'    => $candidate_id,
                'exam_id'		      => $request->exam_id[$key],
                'board_id'		    => $request->board_id[$key],
                'subject_id'		  => $request->subject_id[$key],
                'specialization'	=> $request->specialization[$key],
                'pass_year'		    => $request->pass_year[$key],
                'percentage'		  => $request->percentage[$key],
            ];

            CandidateEduDetails::create($entry);
        }

        DB::commit();
        //Basehelper::clearRoDetails();

        // $validator = Validator::make($data = $request->all(), CandidateInfo::$rules, CandidateInfo::$messages);
        // if ($validator->fails())
        //   return Redirect::back()->withErrors($validator)->withInput();

        return Redirect::route($this->route.'index')->with('message', 'Education Details has been Added!');
    }

    public function createExperience_details(FormBuilder $formBuilder){

        $sectors = [''=>'-- Select --'] + IndustryType::lists('name', 'id')->all();
        $subjects = [''=>'-- Select --'] + Subject::lists('name', 'id')->all();
        $url = $this->route.'store.exp_details';
        return view($this->content.'exp_details', compact('sectors', 'subjects', 'url'));
    }

    public function storeExperience_details(Request $request){
        //$data = $request->all();
        $candidate_id = Auth::candidate()->get()->id;
        DB::beginTransaction();

        foreach($request->employers_name as $key => $n ){

            $entry = [
                'candidate_id'    => $candidate_id,
                'employers_name'	=> $request->employers_name[$key],
                'post_held'		    => $request->post_held[$key],
                'year_experience'	=> $request->year_experience[$key],
                'salary'	        => $request->salary[$key],
                'experience_id'		=> $request->experience_id[$key],
                'industry_id'		  => $request->industry_id[$key],
            ];

            CandidateExpDetails::create($entry);
        }

        DB::commit();
        return Redirect::route($this->route.'index')->with('message', 'Experience Details has been Added!');
    }

    public function createLanguage_details(FormBuilder $formBuilder){

        $languages = [''=>'-- Select --'] + Language::lists('name', 'id')->all();
        $url = $this->route.'store.language_details';
        return view($this->content.'language_details', compact('languages', 'url'));
    }

    public function storeLanguage_details(Request $request){
        //$data = $request->all();
        $candidate_id = Auth::candidate()->get()->id;
        DB::beginTransaction();

        foreach($request->language_id as $key){

            $entry = [
                'candidate_id'    => $candidate_id,
                'language_id'	    => $request->language_id[$key],
                'can_read'		    => $request->can_read[$key],
                'can_write'	      => $request->can_write[$key],
                'can_speak'	      => $request->can_speak[$key],
                'can_speak_fluently'=> $request->can_speak_fluently[$key],
            ];

            CandidateLanguageInfo::create($entry);
        }

        DB::commit();
        return Redirect::route($this->route.'index')->with('message', 'Language Details has been Added!');
    }



}
