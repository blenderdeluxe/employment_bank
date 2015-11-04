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
use employment_bank\Forms\EmployerForm;
use employment_bank\Forms\EmployerFormFull;
use Kris\LaravelFormBuilder\FormBuilderTrait;
class EmployerHomeController extends Controller{

    use FormBuilderTrait;

    private $content  = 'employer.';
    private $route  = 'employer.';

    public function showRegister(){

      $form = $this->form(EmployerFormFull::class, [
          'method' => 'POST',
          'url' => route($this->route.'register')
      ])->remove('save')->remove('update');
        //->showFieldErrors(true)
        // $form = $formBuilder->create('employment_bank\Forms\EmployerForm', [
        //      'method' => 'POST',
        //      'url' => route($this->route.'register')
        // ])->remove('save')->remove('update');
        return view($this->content.'register', compact('form'));
    }

    public function doRegister(Request $request){

      //  $form = $this->form(EmployerForm::class);
      //  $form->validate(Employer::$rules, Employer::$messages);
      // // // It will automatically use current request, get the rules, and do the validation
      // if (!$form->isValid()) {
      //     return redirect()->back()->withErrors($form->getErrors())->withInput();
      // }
      // Post::create($request->all());
      // return redirect()->route('posts');
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
        if(PostedJob::create($data)){

          return Redirect::route($this->route.'list_job')->with('message', 'New Job has been Posted!');
        }else{
          return Redirect::back()->withInput()->with('message', 'Unable to process your request');
        }
    }

    public function listJobs(){
        $id = Auth::employer()->get()->id;
        $results = PostedJob::with('industry')->where('created_by', $id)->paginate(20);
        return view($this->content.'job.index', compact('results'));
    }

    public function editJob($id, FormBuilder $formBuilder){

        $result  = PostedJob::findOrFail($id);
        //$districts = [''=>'-- Select State first--'];
        $form    = $formBuilder->create('employment_bank\Forms\JobCreateForm', [
             'method' => 'PUT',
             'model' => $result,
             'url' => route($this->route.'update_job', $id)
       ])->remove('Submit');

       return view($this->content.'job.edit', compact('form','result'));
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

    public function showProfile(){

        $result = Employer::find(Auth::employer()->get()->id);
        return view($this->content.'profile.show', compact('result'));
    }
    public function updateProfile(Request $request){

        $rules = [
            'photo' => 'mimes:jpeg,png|max:512',
            'organization_name'=> 'required|max:255',
            'tagline'       => 'max:100',
            'web_address'   =>  'url|max:255',
            'details'       =>  'required|max:500',
        ];
        $validator = Validator::make($data = $request->all(), $rules);
        if ($validator->fails())
          return Redirect::back()->withErrors($validator)->withInput();
        $model = Employer::findOrFail(Auth::employer()->get()->id);
        $destination_path = public_path('uploads/employers/');
        if ($request->hasFile('photo')) {

            if ($request->file('photo')->isValid()){
                $fileName = $model->id.'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move($destination_path, $fileName);
                //$data['cv_url'] = 'candidates/'.$candidate->id.'/'.$fileName;
                $data['photo'] = 'uploads/employers/'.$fileName;
            }
        }
        $model->update($data);
        return Redirect::route($this->route.'profile')->with('alert-success', 'Profile has been Updated!');

    }


    public function viewJob($id) {
      
      $results = PostedJob::with('industry')->with('district')->with('exam')->with('subject')->with('employer')->findOrFail($id); //dd($results);
      return view($this->content.'job.view', compact('results'));
    }


}
