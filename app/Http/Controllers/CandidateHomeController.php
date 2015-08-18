<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator, Redirect, DB;
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
    private $candidate_id;

    public function __construct(){
		      $this->candidate_id = Auth::candidate()->get()->id;
	  }

    public function showHome(){

        $candidate_id = $this->candidate_id;
        $progress = 0;
        $candidate = Candidate::find($candidate_id);
        if(count($candidate->bio)==1)
            $progress = 25;
        if (count($candidate->education)>=1)
            $progress = 50;
        if (count($candidate->language)>=1)
            $progress = 75;
        if (count($candidate->experience)>=1)
            $progress = 100;

        $i_card_status = Auth::candidate()->get()->verified_status;

        return view($this->content.'home', compact('progress','i_card_status'));
    }

    public function createResume(FormBuilder $formBuilder){

        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);
        if(count($candidate->bio)==0){

            $form = $formBuilder->create('employment_bank\Forms\CandidateInfoForm', [
                 'method' => 'POST',
                 'url' => route($this->route.'store.resume')
            ])->remove('save')->remove('update');

            return view($this->content.'resume', compact('form'));
        }else{
            return Redirect::route($this->route.'edit.resume')->with('message', 'Review your already filled bio');
        }
    }

    public function storeResume(Request $request){

        $validator = Validator::make($data = $request->all(), CandidateInfo::$rules, CandidateInfo::$messages);
        $data['candidate_id'] = Auth::candidate()->get()->id;

        $candidate = Candidate::find($data['candidate_id']);

        if(count($candidate->bio)==0){

              if ($validator->fails())
                return Redirect::back()->withErrors($validator)->withInput();

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

              return Redirect::route($this->route.'home')->with('message', 'Basic Personal/Contact Info  has been Added!');
          }else{

              return Redirect::route($this->route.'edit.resume')->with('message', 'Edit your changes if needed');
          }
    }

    public function editResume(FormBuilder $formBuilder){

        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);
        $model = CandidateInfo::where('candidate_id', $candidate_id)->first();
        if(count($candidate->bio)==1){

            $form = $formBuilder->create('employment_bank\Forms\CandidateInfoForm', [
                 'method' => 'POST',
                 'model' => $model,
                 'url' => route($this->route.'update.resume')
            ])->remove('save')->remove('update');

            return view($this->content.'resume_edit', compact('form'));
        }else{
            return Redirect::route($this->route.'home')->with('message', 'You can not edit without filling up your bio');
        }
    }

    public function updateResume(Request $request){

        $validator = Validator::make($data = $request->all(), CandidateInfo::$rules, CandidateInfo::$messages);
        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);

        if(count($candidate->bio)==1){

              if ($validator->fails())
                  return Redirect::back()->withErrors($validator)->withInput();

              $cand_info = CandidateInfo::where('candidate_id', $candidate_id)->firstOrFail();
  					  $cand_info->fill($data);

              $destination_path = storage_path('candidates/'.$cand_info->id);
              //Verifying File Presence

              if ($request->hasFile('cv_url')) {

                  if ($request->file('cv_url')->isValid()){
                      $fileName = 'cv.'.$request->file('cv_url')->getClientOriginalExtension();
                      $request->file('cv_url')->move($destination_path, $fileName);
                      $cand_info->cv_url = 'candidates/'.$cand_info->id.'/'.$fileName;
                  }
              }

              if ($request->hasFile('photo_url')) {

                  if ($request->file('photo_url')->isValid()){
                      $fileName = 'photo.'.$request->file('photo_url')->getClientOriginalExtension();
                      $request->file('photo_url')->move($destination_path, $fileName);
                      $cand_info->photo_url = 'candidates/'.$cand_info->id.'/'.$fileName;
                  }
              }

              if (!$cand_info->save())
    						  return Redirect::back()->withInput()->with('message', 'Error Updating your data, Please contact Technical Support');
    					else
                  return Redirect::route($this->route.'home')->with('message', 'Basic Personal Information has been Updated!');

          }else{

              return Redirect::route($this->route.'create.resume')->with('message', 'You can not edit without inserting data' );
          }
    }

    public function createEdu_details(FormBuilder $formBuilder){

        $candidate = Candidate::find($this->candidate_id);

        if(count($candidate->education)==0){

            $exams = [''=>'-- Select --'] + Exam::lists('name', 'id')->all();
            $boards = [''=>'-- Select --'] + Board::lists('name', 'id')->all();
            $subjects = [''=>'-- Select --'] + Subject::lists('name', 'id')->all();
            $url = $this->route.'store.edu_details';

              // $form = $formBuilder->create('employment_bank\Forms\CandidateEdu_detailsForm', [
              //      'method' => 'POST',
              //      'url' => route($this->route.'store.edu_details')
              // ])->remove('save')->remove('update');

            return view($this->content.'edu_details', compact('exams', 'boards', 'subjects', 'url'));
      }else{

            return "DATA ALREADY EXISTS IN EDUCATION DETAILS, SO <br>TODO REDIRECT TO EDIT/UPDATE EDUCATION DETAILS";
      }

    }

    public function storeEdu_details(Request $request){

      $candidate_id = $this->candidate_id;
      $candidate = Candidate::find($candidate_id);

      if(count($candidate->education)==0){
              //$data = $request->all(); ??NO SERVER SIDE VALIDATION HAS BEEN SET BECAUSE even if you set also if we redirect back the user have reinster every details entry
              //$exam_id 	= $request->exam_id;
              //candidate_id
              // 'board_id'    => 'required|exists,master_boards,id',
              // 'subject_id'  => 'sometimes',
              // 'specialization'  =>  'required|max:50',
              // 'pass_year'  =>  'required|numeric',
              // 'percentage'  =>  'required|numeric'

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
              return Redirect::route($this->route.'home')->with('message', 'Education Details has been Added!');
          }else{

              return "TODO REDIRECT TO EDIT/UPDATE EDUCATION DETAILS view";
          }
    }

    public function createExperience_details(FormBuilder $formBuilder){

        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);
        if(count($candidate->experience)==0){

            $sectors = [''=>'-- Select --'] + IndustryType::lists('name', 'id')->all();
            $subjects = [''=>'-- Select --'] + Subject::lists('name', 'id')->all();
            $url = $this->route.'store.exp_details';
            return view($this->content.'exp_details', compact('sectors', 'subjects', 'url'));
        }else{
            return "EXPERIENCE DETAILS ALREADY SET SO REDIRECT THE CANDIDATE TO UPDATE EXISTING DETAILS AND ADD NEW";
        }
    }

    public function storeExperience_details(Request $request){

        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);
        if(count($candidate->experience)==0){

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
            return Redirect::route($this->route.'home')->with('message', 'Experience Details has been Added!');
        }else{
            return "TODO: <br>SHOW/ EDIT EXISTING EXPERENCE/JOB DETAILS";
        }
    }

    public function createLanguage_details(FormBuilder $formBuilder){

        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);
        if(count($candidate->language)==0){

            $languages = [''=>'-- Select --'] + Language::lists('name', 'id')->all();
            $url = $this->route.'store.language_details';
            return view($this->content.'language_details', compact('languages', 'url'));
        }else{

            return "EDIT/UPDATE LANGUAGE DETAILS";
        }
    }

    public function storeLanguage_details(Request $request){

        //return $request->all();
        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);
        if(count($candidate->language)==0){
            DB::beginTransaction();
            foreach($request->language_id as $key => $n){

                $entry = [
                    'candidate_id'    => $candidate_id,
                    //'language_id'	    => $request->language_id[$key],
                    'language_id'	    => $n,
                    'can_read'		    => $request->can_read[$key],
                    'can_write'	      => $request->can_write[$key],
                    'can_speak'	      => $request->can_speak[$key],
                    'can_speak_fluently'=> $request->can_speak_fluently[$key],
                ];
                CandidateLanguageInfo::create($entry);
            }
            DB::commit();
            return Redirect::route($this->route.'home')->with('message', 'Language Details has been Added!');
        }else{
            return "LANGUAGES DEATILS ALREADY EXISTS/ REDIRECT TO EDIT/UPDATE LANGUGAE";
        }

    }

    public function get_identitycard(){

        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);

        $info = CandidateInfo::where('candidate_id', $candidate_id)->count();
        $edu = CandidateEduDetails::where('candidate_id', $candidate_id)->count();
        $lang = CandidateLanguageInfo::where('candidate_id', $candidate_id)->count();

        if($info==0 || $edu ==0 || $lang==0)
            return Redirect::back()->with('message', 'You profile has not enough information available to Generate Identity Card!<br>Please Update your profile information');

        return $i_card = Basehelper::generateIdCard($candidate_id);
        // if($candidate->verified_status!='Verified')
        //   Candidate::find($candidate_id);

    }




}
