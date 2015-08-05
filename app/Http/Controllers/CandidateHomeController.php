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

class CandidateHomeController extends Controller{

    private $content  = 'webfront.candidate.';

    public function showRegister(){

      return view($this->content.'register');
    }

    public function doRegister(Request $request){

        $validator = Validator::make($data = $request->all(), Candidate::$rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        $input = Input::all();
        $validation = Validator::make($input, Candidate::$rules, Candidate::$messages);

        if ($validation->passes()){

          $confirmation_code = Str::quickRandom(30);
      		$student = new Candidate;
      		$student->name = ucwords($request->fullname);
        	$student->username = Input::get('username');
        	$student->mobile_no = Input::get('mobile_no');
        	$student->email = Input::get('email');
        	$student->password = Hash::make(Input::get('password'));
        	$student->confirmation_code = $confirmation_code;

        	$data = ['confirmation_code' => $confirmation_code,
        			 'username' => Input::get('username'),
        			 'password' => Input::get('password'),
        			 'mobile_no' => Input::get('mobile_no')
        	];

      		Basehelper::sendSMS(Input::get('mobile_no'), 'Hello '.Input::get('username').', you have successfully registere. Your username is '.Input::get('username').' and password is '.Input::get('password'));

      	  	Mail::send('emails.verify', $data, function($message) use ($student, $data){
      	  		$message->from('no-reply@employment_bank', 'Employment Bank');
                	$message->to(Input::get('email'), $student->name)
                    	->subject('Verify your email address');
            });

            	if(!$student->save())
      	  		return Redirect::back()->with('message', 'Error while creating your account!<br> Please contact Technical Support');

      	  	return Redirect::route('students.login')->with('message', 'Account has been created!<br>Now Check your email address to verify your account by checking your spam folder or inboxes for verification link after that you can login');
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
