<?php
namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;

use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;
use Validator, Redirect, DB;
use employment_bank\Models\Candidate;
use employment_bank\Models\CandidateInfo;
use employment_bank\Models\CandidateEduDetails;
use employment_bank\Models\CandidateLanguageInfo;
use employment_bank\Models\District;

class RestController extends Controller{


      public static function getDistricts(Request $request){

	        $id = $request->state_id;
	        return District::where('state_id', $id)->get();
      }

      public function viewIdentityCard($candidate_id){

          $candidate = Candidate::find($candidate_id);
          $info = CandidateInfo::where('candidate_id', $candidate_id)->count();
          $edu = CandidateEduDetails::where('candidate_id', $candidate_id)->count();
          $lang = CandidateLanguageInfo::where('candidate_id', $candidate_id)->count();

          if($info==0 || $edu ==0 || $lang==0)
              return Redirect::back()->with('message', 'The Profile has not enough information available to view Identity Card!');

        return $result = Candidate::join('candidate_infos', 'candidates.id', '=', 'candidate_infos.candidate_id')
                            ->join('master_casts', 'candidate_infos.caste_id', '=', 'master_casts.id')
                            ->join('master_proof_details', 'candidate_infos.proof_details_id', '=', 'master_proof_details.id')
                            ->join('candidate_edu_details', 'candidates.id', '=', 'candidate_edu_details.candidate_id')
                            ->join('master_exams', 'candidate_edu_details.exam_id', '=', 'master_exams.id')
                            ->join('master_subjects', 'candidate_edu_details.subject_id', '=', 'master_subjects.id')
                            ->select('candidates.id', 'candidate_infos.fullname','candidate_infos.index_card_no', 'candidate_infos.created_at', 'candidate_infos.dob', 'candidate_infos.physical_challenge', 'candidate_infos.ex_service', 'master_casts.name as caste', 'master_exams.name as exam_name', 'master_subjects.name as subject', 'master_proof_details.name as id_proof', 'candidate_infos.proof_no', 'candidate_infos.photo_url')
                            ->where('candidates.id', $candidate_id)
                            ->get();
          return view('admin.identitycard',compact('result'));
      }

}
