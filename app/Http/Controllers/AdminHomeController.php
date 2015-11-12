<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator;
use employment_bank\Models\Admin;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Redirect, Session, Hashids, Auth;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;
use employment_bank\Models\Employer;
use employment_bank\Models\PostedJob;
use employment_bank\Models\Candidate;
use employment_bank\Models\CandidateInfo;
use employment_bank\Models\CandidateEduDetails;
use employment_bank\Models\CandidateExpDetails;
use employment_bank\Models\CandidateLanguageInfo;

class AdminHomeController extends Controller{

    private $content  = 'admin.';
    //test changes
    //new lol

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

    public function applications_recieved(){

        $results = CandidateInfo::join('candidates', 'candidate_infos.candidate_id', '=', 'candidates.id')
                
                ->where('candidate_infos.index_card_no', '!=', 'NULL')
                ->where('candidate_infos.index_card_no', '!=', '')
                ->where('candidates.verified_status', 'Not Verified')
                ->select('candidates.id', 'candidate_infos.fullname','candidate_infos.index_card_no as index_card_no',
                'candidate_infos.sex as sex', 'candidate_infos.address as address'  )
                ->get();

        return view($this->content.'applications.recieved', compact('results'));
    }

    public function applications_verified()
    {
        $results = CandidateInfo::join('candidates', 'candidate_infos.candidate_id', '=', 'candidates.id')
                ->where('candidates.verified_status', 'Verified')
                ->where('candidate_infos.index_card_no', '!=', 'NULL')
                ->where('candidate_infos.index_card_no', '!=', '')
                ->select('candidates.id', 'candidate_infos.fullname','candidate_infos.index_card_no as index_card_no',
                'candidate_infos.sex as sex', 'candidate_infos.address as address'  )
                ->get();

        return view($this->content.'applications.verified', compact('results'));
    }
    public function applications_suspended()
    {
        $results = CandidateInfo::join('candidates', 'candidate_infos.candidate_id', '=', 'candidates.id')
                ->where('candidates.verified_status', 'Halted')
                // ->where('candidate_infos.index_card_no', '!=', 'NULL')
                // ->where('candidate_infos.index_card_no', '!=', '')
                ->select('candidates.id', 'candidate_infos.fullname','candidate_infos.index_card_no as index_card_no',
                'candidate_infos.sex as sex', 'candidate_infos.address as address'  )
                ->get();

        return view($this->content.'applications.suspended', compact('results'));
    }

    public function verifyCandidate($candidate_id)
    {
        //This will approve the candiate
        //Hashids::getDefaultConnection();
        $decoded =  Hashids::decode($candidate_id);
        $id = $decoded[0];
        $candidate = Candidate::find($decoded)->first();
        $candidate->verified_status = 'Verified';
        $candidate->verified_by = Auth::admin()->get()->id;
        
        if($candidate->save()){

            return redirect()->route('admin.applications_verified')->with('message', 'The Application has been Verified Successfully');

        }else{
            return redirect()->back()->with('message', 'Unable to process your request. Please try again or contact TechSupport.');
        }
    }

    public function suspendCandidate($candidate_id)
    {

        $decoded =  Hashids::decode($candidate_id);
        $id = $decoded[0];
        $candidate = Candidate::find($decoded)->first();
        $candidate->verified_status = 'Halted';
        $candidate->verified_by = Auth::admin()->get()->id;
        
        if($candidate->save()){

            return redirect()->route('admin.applications_suspended')->with('message', 'The Application has been Halted');

        }else{
            return redirect()->back()->with('message', 'Unable to process your request. Please try again or contact TechSupport.');
        }
    }


    public function employerListAll()
    {
        $results = Employer::with('industry')->paginate(1);
        return view($this->content.'employers.index', compact('results'));
    }

    public function viewEmployerProfile($employer_id)
    {
        //Hashids::getDefaultConnection();
        $id =  Hashids::decode($employer_id);
        $employer = Employer::find($id)->first();
        //return $employer->photo;
        $total_jobs  = PostedJob::where('created_by', $id)
                            ->count();
        $jobs_not_verified = PostedJob::with('industry')->where('created_by', $id)
                            ->where('status', 0)
                            ->get();
        $jobs_available = PostedJob::with('industry')->where('created_by', $id)
                            ->where('status', 1)
                            ->get(); //to gel alll jobs that is marked as available/published

        $jobs_filled_up = PostedJob::with('industry')->where('created_by', $id)
                            ->where('status', 2)
                            ->get();

        return view($this->content.'employers.profile', compact('employer', 'jobs_not_verified','jobs_available','jobs_filled_up','total_jobs'));
      }

      public function jobListAll()
      {
          $results = PostedJob::with('industry')->get();

          return view($this->content.'jobs.index', compact('results'));
      }

      public function viewJob($id)
      {
            $decoded =  Hashids::decode($id);
            $id = $decoded[0];
            $results = PostedJob::with('industry')->with('district','exam','subject','employer')->findOrFail($id); //dd($results);
            return view($this->content.'jobs.view', compact('results'));
      }
      public function jobUpdateStatus($id, Request $request)
      {
            $decoded =  Hashids::decode($id);
            $id = $decoded[0];
            $modal = PostedJob::findOrFail($id);
            $modal->status = $request->status;

            if($modal->save()){
                return redirect()->back()->with('message', 'Status has been successfully Updated');
            }else{
                return redirect()->back()->with('message', 'Unable to process your request');
            }
      }
}
