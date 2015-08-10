<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator;
use employment_bank\Models\Admin;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;

class AdminHomeController extends Controller{

    private $content  = 'admin.';

    public function showRegister(){

      return view($this->content.'layouts.register');
    }

    public function doRegister(Request $request){

        $validator = Validator::make($data = $request->all(), Admin::$rules, Admin::$messages);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();

        if ($validator->passes()){

          $confirmation_code = Str::quickRandom(30);
      		$admin = new Admin;
      		$admin->fullname = ucwords($request->fullname);
        	$admin->mobile_no = $request->mobile_no;
        	$admin->email = $request->email;
        	$admin->password = bcrypt($request->password);
        	$admin->confirmation_code = $confirmation_code;

        	$data = ['confirmation_code' => $confirmation_code,
        			 'username' => $request->username,
        			 'password' => $request->password,
        			 'mobile_no' => $request->mobile_no
        	];

      		Basehelper::sendSMS($request->mobile_no, 'Hello '.$request->username.', you have successfully registere. Your username is '.$request->username.' and password is '.$request->password);

    	  	// Mail::send('emails.verify', $data, function($message) use ($admin, $data){
    	  	// 	$message->from('no-reply@employment_bank', 'Employment Bank');
          //     	$message->to(Input::get('email'), $admin->name)
          //         	->subject('Verify your email address');
          // });

        	if(!$admin->save())
  	  		return Redirect::back()->with('message', 'Error while creating your account!<br> Please contact Technical Support');

  	  	  return Redirect::route('admin.login')->with('message', 'Account has been created!<br>Now Check your email address to verify your account by checking your spam folder or inboxes for verification link after that you can login');
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
