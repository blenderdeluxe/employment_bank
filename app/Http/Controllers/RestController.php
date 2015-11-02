<?php
namespace employment_bank\Http\Controllers;

use Illuminate\Http\Request;

use employment_bank\Http\Requests;
use employment_bank\Http\Controllers\Controller;

use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Support\Str;
use employment_bank\Helpers\Basehelper;
use Validator, Redirect, DB, Hashids;
use employment_bank\Models\Candidate;
use employment_bank\Models\CandidateInfo;
use employment_bank\Models\CandidateExpDetails;
use employment_bank\Models\CandidateEduDetails;
use employment_bank\Models\CandidateLanguageInfo;
use employment_bank\Models\District;

class RestController extends Controller{


      public static function getDistricts(Request $request){

	        $id = $request->state_id;
	        return District::where('state_id', $id)->get();
      }

      public function viewIdentityCard($candidate_id){

          if(!Basehelper::check_candidate($candidate_id)){

              return Redirect::back()->with('message', 'The Profile has not enough information available to view Identity Card!');
          }

          $result = Candidate::join('candidate_infos', 'candidates.id', '=', 'candidate_infos.candidate_id')
                            ->join('master_casts', 'candidate_infos.caste_id', '=', 'master_casts.id')
                            ->join('master_proof_details', 'candidate_infos.proof_details_id', '=', 'master_proof_details.id')
                            ->join('candidate_edu_details', 'candidates.id', '=', 'candidate_edu_details.candidate_id')
                            ->join('master_exams', 'candidate_edu_details.exam_id', '=', 'master_exams.id')
                            ->join('master_subjects', 'candidate_edu_details.subject_id', '=', 'master_subjects.id')
                            ->select('candidates.id', 'candidate_infos.fullname','candidate_infos.index_card_no', 'candidate_infos.created_at', 'candidate_infos.dob', 'candidate_infos.physical_challenge', 'candidate_infos.ex_service', 'master_casts.name as caste', 'master_exams.name as exam_name', 'master_subjects.name as subject', 'master_proof_details.name as id_proof', 'candidate_infos.proof_no', 'candidate_infos.photo_url')
                            ->where('candidates.id', $candidate_id)
                            //->first();
                            ->get();
          //return Hashids::encode($result->photo_url);
          return view('admin.identitycard',compact('result'));
      }

      public function viewCandidateProfile($candidate_id)
      {
        //Hashids::getDefaultConnection();
        $decoded =  Hashids::decode($candidate_id);
        //return count($decoded);
         //code for displaying full profle with bio, educations detals, experience details and so
        $candidate = Candidate::find($decoded)->first();
        //return $candidate;
        $info = CandidateInfo::where('candidate_id', $decoded)->first();
        //$edu = CandidateEduDetails::where('candidate_id', $decoded)->get();
        $edu = CandidateEduDetails::where('candidate_id', $decoded)
                ->join('master_exams', 'candidate_edu_details.exam_id', '=', 'master_exams.id')
                ->join('master_boards', 'candidate_edu_details.board_id', '=', 'master_boards.id')
                ->join('master_subjects', 'candidate_edu_details.subject_id', '=', 'master_subjects.id')
                ->select('master_exams.name as exam_name', 'master_exams.exam_category',
                  'candidate_edu_details.specialization', 'candidate_edu_details.pass_year', 'candidate_edu_details.percentage',
                  'master_boards.name as board_name', 'master_subjects.name as subject_name'
                 )
                ->get();
                //::join('candidates', 'candidate_infos.candidate_id', '=', 'candidates.id')
        $lang = CandidateLanguageInfo::where('candidate_id', $decoded)->get();

        $exp = CandidateExpDetails::where('candidate_id', $decoded)
                ->join('master_industry_types', 'candidate_experience_details.industry_id', '=', 'master_industry_types.id')
                ->join('master_subjects', 'candidate_experience_details.experience_id', '=', 'master_subjects.id')
                ->select('master_subjects.name as exp_type', 'master_industry_types.name as sector',
                'candidate_experience_details.post_held', 'candidate_experience_details.year_experience',
                'candidate_experience_details.salary', 'candidate_experience_details.employers_name')
                ->orderBy('candidate_experience_details.id', 'DESC')
                ->get();

        return view('admin.applications.profile',compact('candidate', 'info', 'edu', 'lang', 'exp'));
      }
}
