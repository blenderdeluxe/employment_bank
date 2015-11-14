<?php

namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;
use Validator, Redirect, DB, Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;
use Illuminate\Support\Facades\Response;

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
		      //$this->candidate_id = Auth::candidate()->get()->id;
          $this->candidate_id = Session::get('candidate_id');
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
        $data['candidate_id'] = $this->candidate_id;
        $candidate = Candidate::find($this->candidate_id);

        if(count($candidate->bio)==0){

              if ($validator->fails())
                return Redirect::back()->withErrors($validator)->withInput();
              //return $serverFileName = "photo.".$request->photo_url->getClientOriginalExtension();
              //$file = $request->file('cv_url');
              $destination_path = storage_path('candidates/'.date('Y').'/'.$candidate->id);
              //$destination_path = public_path('candidates/'.$candidate->id);
              //Verifying File Presence
              if ($request->hasFile('cv_url')) {

                  if ($request->file('cv_url')->isValid()){
                      $fileName = 'cv.'.$request->file('cv_url')->getClientOriginalExtension();
                      $request->file('cv_url')->move($destination_path, $fileName);
                      //$data['cv_url'] = 'candidates/'.$candidate->id.'/'.$fileName;
                      $data['cv_url'] = 'candidates/'.date('Y').'/'.$candidate->id.'/'.$fileName;
                  }
              }

              if ($request->hasFile('photo_url')) {

                  if ($request->file('photo_url')->isValid()){
                      $fileName = 'photo.'.$request->file('photo_url')->getClientOriginalExtension();
                      $request->file('photo_url')->move($destination_path, $fileName);
                      //$data['photo_url'] = 'candidates/'.$candidate->id.'/'.$fileName;
                      $data['photo_url'] = 'candidates/'.date('Y').'/'.$candidate->id.'/'.$fileName;
                  }
              }

              $info = CandidateInfo::create($data);
              return Redirect::route($this->route.'home')->with('message', 'Personal/Contact Info has been Added!');
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

            return view($this->content.'resume_edit', compact('form', 'model'));
        }else{
            return Redirect::route($this->route.'home')->with('message', 'You can not edit without filling up your bio');
        }
    }

    public function updateResume(Request $request){

        $validator = Validator::make($data = $request->all(), CandidateInfo::$rules, CandidateInfo::$messages);
        
        $validator = CandidateInfo::getValidationRules($rules = 'update');
        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);
        $check_if_valid = $this->validate($request, $validator);
        if(count($candidate->bio)==1){

              if ($check_if_valid)
                  return Redirect::back()->withErrors($validator)->withInput();

              $cand_info = CandidateInfo::where('candidate_id', $candidate_id)->firstOrFail();
              $destination_path = storage_path('candidates/'.date('Y').'/'.$candidate->id);
              //Verifying File Presence
              if ($request->hasFile('cv_url')) {

                  if ($request->file('cv_url')->isValid()){
                      $fileName = 'cv.'.$request->file('cv_url')->getClientOriginalExtension();
                      $request->file('cv_url')->move($destination_path, $fileName);
                      //$data['cv_url'] = 'candidates/'.$candidate->id.'/'.$fileName;
                      $data['cv_url'] = 'candidates/'.date('Y').'/'.$candidate->id.'/'.$fileName;
                  }
              }

              if ($request->hasFile('photo_url')) {

                  if ($request->file('photo_url')->isValid()){
                      $fileName = 'photo.'.$request->file('photo_url')->getClientOriginalExtension();
                      $request->file('photo_url')->move($destination_path, $fileName);
                      //$data['photo_url'] = 'candidates/'.$candidate->id.'/'.$fileName;
                      $data['photo_url'] = 'candidates/'.date('Y').'/'.$candidate->id.'/'.$fileName;
                  }
              }
              $cand_info->fill($data);

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

      //check if candidate education details exisis
      if(count($candidate->education) == 0){

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
          return Redirect::route($this->route.'edit.edu_details')->with('message', 'Edit your changes if needed');
          //return "DATA ALREADY EXISTS IN EDUCATION DETAILS, SO <br>TODO REDIRECT TO EDIT/UPDATE EDUCATION DETAILS";
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
            //return "TODO REDIRECT TO EDIT/UPDATE EDUCATION DETAILS view";
            return Redirect::route($this->route.'edit.edu_details')->with('message', 'Edit your changes if needed');
          }
    }


    public function editEdu_details(FormBuilder $formBuilder) {
      $candidate_id = $this->candidate_id;
      $candidate = Candidate::find($candidate_id);
      $res = CandidateEduDetails::where('candidate_id', $candidate_id)->get();
      

      if(count($candidate->education) >=1){

          $form = $formBuilder->create('employment_bank\Forms\CandidateEdu_detailsForm', [
               'method' => 'POST',
               //'model' => $model,
               'url' => route($this->route.'edit.edu_details')
          ])->remove('save')->remove('update');
          return view($this->content.'edu_details_edit', compact('form', 'res'));
      }else{
          return Redirect::route($this->route.'home')->with('message', 'You can not edit without filling up your bio');
      }
    }

    public function updateEdu_details(Request $request) {
      $data = $request->all();
      
      $candidate_id = $this->candidate_id;
      $candidate = Candidate::find($candidate_id);
      //dd($candidate->education);
      if(count($candidate->education) >= 1){
          for($i = 0; $i < count($data['eduIds']); $i++) {

            $k = $i+1;
            $rules  = [
                //'candidate_id' => 'required' ,
                'exam_id_'.$k     => 'required',
                'board_id_'.$k     => 'required',
                'subject_id_'.$k   => 'sometimes',
                'specialization_'.$k   =>  'required|max:50',
                'pass_year_'.$k    =>  'required|numeric',
                'percentage_'.$k   =>  'required|numeric'
            ];
            $this->validate($request, $rules);

            $candidate_edu_details = CandidateEduDetails::find($data['eduIds'][$i]);
            
            $candidate_edu_details->exam_id = $data['exam_id_'.$k];
            $candidate_edu_details->board_id = $data['board_id_'.$k];
            $candidate_edu_details->subject_id = $data['subject_id_'.$k];
            $candidate_edu_details->specialization = $data['specialization_'.$k];
            $candidate_edu_details->pass_year = $data['pass_year_'.$k];
            $candidate_edu_details->percentage = $data['percentage_'.$k];
            $candidate_edu_details->save();
          }
          return Redirect::route($this->route.'home')->with('message', 'Educational Information has been Updated!');
        }else{

            return Redirect::route($this->route.'create.edu_details')->with('message', 'You can not edit without inserting data' );
        }
    }

    public function createExperience_details(FormBuilder $formBuilder){

        $candidate_id = $this->candidate_id;
        $candidate = Candidate::find($candidate_id);
        if(count($candidate->experience)==0) {

            $sectors = [''=>'-- Select --'] + IndustryType::lists('name', 'id')->all();
            $subjects = [''=>'-- Select --'] + Subject::lists('name', 'id')->all();
            $url = $this->route.'store.exp_details';
            return view($this->content.'exp_details', compact('sectors', 'subjects', 'url'));
        }else{
            return "EXPERIENCE DETAILS ALREADY SET SO REDIRECT THE CANDIDATE TO UPDATE EXISTING DETAILS AND ADD NEW";
        }
    }

    public function storeExperience_details(Request $request){
        return $request->all();
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
          return Redirect::route($this->route.'edit.language_details')->with('message', 'Edit your changes if needed');
          //return "EDIT/UPDATE LANGUAGE DETAILS";
        }
    }

    public function storeLanguage_details(Request $request){

        
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

    public function editLanguage_details() {
      $candidate_id = $this->candidate_id;
      $candidate = Candidate::find($candidate_id);
      
      if(count($candidate->language) >=1){
        $res = CandidateLanguageInfo::where('candidate_id', $candidate_id)->get();
        $languages = [''=>'-- Select --'] + Language::lists('name', 'id')->all();
        $url = $this->route.'update.language_details';

        return view($this->content.'language_details_edit', compact('res', 'languages', 'url'));
      }else{
          return Redirect::route($this->route.'home')->with('message', 'You can not edit without filling up your bio');
      }
    }

    public function updateLanguage_details(Request $request) {
      $data = $request->all();
        //dd($data);
      $candidate_id = $this->candidate_id;
      $candidate = Candidate::find($candidate_id);
      //dd($candidate->education);
      if(count($candidate->language) >= 1){
          for($i = 0; $i < count($data['langIds']); $i++) {

            $k = $i+1;
            $rules  = [
                'can_read_'.$k         =>  'required|in:YES,NO',
                'can_write_'.$k        =>  'required|in:YES,NO',
                'can_speak_'.$k        =>  'required|in:YES,NO',
                'can_speak_fluently_'.$k =>  'required|in:YES,NO',
            ];
            $this->validate($request, $rules);

            $candidate_lang_details = CandidateLanguageInfo::find($data['langIds'][$i]);

            $candidate_lang_details->can_read = $data['can_read_'.$k];
            $candidate_lang_details->can_write = $data['can_write_'.$k];
            $candidate_lang_details->can_speak = $data['can_speak_'.$k];
            $candidate_lang_details->can_speak_fluently = $data['can_speak_fluently_'.$k];
            $candidate_lang_details->save();
          }
          return Redirect::route($this->route.'home')->with('message', 'Language Information has been Updated!');
        }else{

            return Redirect::route($this->route.'create.language_details')->with('message', 'You can not edit without inserting data' );
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

        $i_card = Basehelper::generateIdCard($candidate_id);
        $result = Candidate::join('candidate_infos', 'candidates.id', '=', 'candidate_infos.candidate_id')
                          ->join('master_casts', 'candidate_infos.caste_id', '=', 'master_casts.id')
                          ->join('master_proof_details', 'candidate_infos.proof_details_id', '=', 'master_proof_details.id')
                          ->join('candidate_edu_details', 'candidates.id', '=', 'candidate_edu_details.candidate_id')
                          ->join('master_exams', 'candidate_edu_details.exam_id', '=', 'master_exams.id')
                          ->join('master_subjects', 'candidate_edu_details.subject_id', '=', 'master_subjects.id')
                          ->select('candidate_infos.id', 'candidate_infos.fullname', 'candidate_infos.created_at', 'candidate_infos.dob', 'candidate_infos.physical_challenge', 'candidate_infos.ex_service', 'master_casts.name as caste', 'master_exams.name as exam_name', 'master_subjects.name as subject', 'master_proof_details.name as id_proof', 'candidate_infos.proof_no', 'candidate_infos.photo_url')
                          ->where('candidates.id', $candidate_id)
                          ->first();
                          //->get();
        return view($this->content.'identitycard',compact('i_card', 'result', 'photo'));
        // if($candidate->verified_status!='Verified')
        //   Candidate::find($candidate_id);

    }

    public function file_preview($file, $year, $id, $file_name){
          //files/{file}/{year}/{id}/{file_name}/preview
          $url = $file.'/'.$year.'/'.$id.'/'.$file_name;
          $path = storage_path($url);
          $handler = new \Symfony\Component\HttpFoundation\File\File($path);
          $lifetime = 31556926;
          /**
          * Prepare some header variables
          */
          $file_time = $handler->getMTime(); // Get the last modified time for the file (Unix timestamp)
          $header_content_type = $handler->getMimeType();
          $header_content_length = $handler->getSize();
          $header_etag = md5($file_time . $path);
          $header_last_modified = gmdate('r', $file_time);
          $header_expires = gmdate('r', $file_time + $lifetime);

          $headers = array(
            'Content-Disposition' => 'inline; filename="' . $url . '"',
            'Last-Modified' => $header_last_modified,
            'Cache-Control' => 'must-revalidate',
            'Expires' => $header_expires,
            'Pragma' => 'public',
            'Etag' => $header_etag
          );
          /** Is the resource cached? */
          $h1 = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $header_last_modified;
          $h2 = isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $header_etag;

          if ($h1 || $h2) {
              return Response::make('', 304, $headers);
              // File (image) is cached by the browser, so we don't have to send it again
          }

          $headers = array_merge($headers, array(
              'Content-Type' => $header_content_type,
              'Content-Length' => $header_content_length
          ));

          return Response::make(file_get_contents($path), 200, $headers);
    }

    public function image_preview($info){

          //TODO have to code for checking whether the candidate acessing the url is meant for him or others if not his/her then restrict 404
          $info = CandidateInfo::find($info);
          $path = storage_path($info->photo_url);
          $handler = new \Symfony\Component\HttpFoundation\File\File($path);
          $lifetime = 31556926;
          /**
          * Prepare some header variables
          */
          $file_time = $handler->getMTime(); // Get the last modified time for the file (Unix timestamp)
          $header_content_type = $handler->getMimeType();
          $header_content_length = $handler->getSize();
          $header_etag = md5($file_time . $path);
          $header_last_modified = gmdate('r', $file_time);
          $header_expires = gmdate('r', $file_time + $lifetime);

          $headers = array(
            'Content-Disposition' => 'inline; filename="' . $info->photo_url . '"',
            'Last-Modified' => $header_last_modified,
            'Cache-Control' => 'must-revalidate',
            'Expires' => $header_expires,
            'Pragma' => 'public',
            'Etag' => $header_etag
          );
          /** Is the resource cached? */
          $h1 = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $_SERVER['HTTP_IF_MODIFIED_SINCE'] == $header_last_modified;
          $h2 = isset($_SERVER['HTTP_IF_NONE_MATCH']) && str_replace('"', '', stripslashes($_SERVER['HTTP_IF_NONE_MATCH'])) == $header_etag;

          if ($h1 || $h2) {
              return Response::make('', 304, $headers);
              // File (image) is cached by the browser, so we don't have to send it again
          }

          $headers = array_merge($headers, array(
              'Content-Type' => $header_content_type,
              'Content-Length' => $header_content_length
          ));

          return Response::make(file_get_contents($path), 200, $headers);
    }


}
