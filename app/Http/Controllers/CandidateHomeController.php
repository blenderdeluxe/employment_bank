<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Auth;
use employment_bank\Models\CandidateInfo;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;

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
        $serverFileName = "cv.".$request->cv_url->getClientOriginalExtension();

        $request->cv_url->move(storage_path('candidates/'.$form_no), $serverFileName);

  			// foreach($_FILES as $field => $file){
        //
        //     echo $field;
        //     print_r($file);
    		//     $array = array(' ', '/', '-', '\'', '@');
        //     $fileName = str_replace($array, "_", $fileDesc);
			  //   	$serverFileName = $fileName.".".Input::file($field)->getClientOriginalExtension();
        //
			  //   	Input::file($field)->move(storage_path('students/'.$form_no), $serverFileName);
    		// 		//array_push($files, $fileName);
        // }
        return "E";

        return Redirect::route($this->route.'index')->with('message', 'Basic Personal/Contact Info  has been Added!');
    }

    // public function createEdu_details(FormBuilder $formBuilder){
    //
    //     $form = $formBuilder->create('employment_bank\Forms\CandidateEdu_detailsForm', [
    //          'method' => 'POST',
    //          'url' => route($this->route.'store.edu_details')
    //     ])->remove('save')->remove('update');
    //
    //     return view($this->content.'resume', compact('form'));
    // }
    //
    // public function storeEdu_details(Request $request){
    //
    //     $validator = Validator::make($data = $request->all(), CandidateInfo::$rules, CandidateInfo::$messages);
    //     if ($validator->fails())
    //       return Redirect::back()->withErrors($validator)->withInput();
    //
    //     CandidateInfo::create($data);
    //     return Redirect::route($this->route.'index')->with('message', 'Basic Personal/Contact Info  has been Added!');
    // }


}
