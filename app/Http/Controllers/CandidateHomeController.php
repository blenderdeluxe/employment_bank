<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator;
use employment_bank\Models\Candidate;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;

class CandidateHomeController extends Controller{

    private $content  = 'webfront.candidate.';

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

  	  	return Redirect::route('webfront.login')->with('message', 'Account has been created!<br>Now Check your email address to verify your account by checking your spam folder or inboxes for verification link after that you can login');
      	  	//sendConfirmation() Will go the email and sms as needed

            }else{
      		return Redirect::back()->withInput()
                	->withErrors($validation);
                // ->with('message', 'There were validation errors.');
            }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
