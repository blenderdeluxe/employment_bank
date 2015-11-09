<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\Caste;
use employment_bank\Models\State;
use employment_bank\Models\District;
use employment_bank\Models\MasterProof;
use employment_bank\Models\CandidateInfo;

class CandidateInfoForm extends Form{

    public function buildForm(){

      $this->add('fullname', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'Full Name'],
          'label' =>  'Full Name :'
      ]);
      $this->add('guar_name', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'Guardian Name'],
          'label' =>  'Father’s / Mother’s Name :'
      ]);

      $this->add('spouse_name', 'text', [
          'attr' => ['maxlength' => '50', 'placeholder'=> 'Spouse Name'],
          'label' =>  'Spouse Name :'
      ]);

      $this->add('sex', 'select', [
             'choices' => CandidateInfo::$sex_options,
             'empty_value' => '--- Select ---',
             'label' => 'Sex :',
             'attr' => ['required'],
      ]);

      $this->add('caste_id', 'select', [
             'choices' => Caste::lists('name', 'id')->all(),
             'empty_value' => '--- Select ---',
             'label' => 'Caste :',
             'attr' => ['required'],
      ]);
      $this->add('religion', 'select', [
             'choices' => CandidateInfo::$religion_options,
             'empty_value' => '--- Select ---',
             'label' => 'Religion :',
             'attr' => ['required'],
      ]);
      $this->add('marital_status', 'select', [
             'choices' => CandidateInfo::$marital_status_options,
             'empty_value' => '--- Select ---',
             'label' => 'Marital Status :',
             'attr' => ['required'],
      ]);
      $this->add('dob', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'DD-MM-YYYY', 'class'=>'form-control _date', 'readonly'],
          'label' =>  'Date of birth:'
      ]);
      $this->add('physical_challenge', 'select', [
             'choices' => ['YES'=>'YES', 'NO'=>'NO'],
             'empty_value' => '--- Select ---',
             'label' => 'Physically Challenged',
             'attr' => ['required'],
      ]);
      $this->add('ex_service', 'select', [
             'choices' => ['YES'=>'YES', 'NO'=>'NO'],
             'empty_value' => '--- Select ---',
             'label' => 'Whether Ex-serviceman',
             'attr' => ['required'],
      ]);
      $this->add('address', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '5', 'placeholder'=> 'Address details'],
          'label' =>  'Address'
      ]);
      //$states = State::lists('name', 'id')->all();
      $this->add('state_id', 'select', [
             'choices' => ['3'=>'Arunachal Pradesh (AR)'], //currentl only arunachal
             //'empty_value' => '--- Select ---',
             'label' => 'State',
             'attr' => ['required'],
      ]);
      $districts = District::lists('name', 'id')->all();
      $this->add('district_id', 'select', [
             'choices' => $districts, //currentl only arunachal districts are fetched
             'empty_value' => '--- Select ---',
             'label' => 'District',
             'attr' => ['required'],
      ]);
      $this->add('pincode', 'text', [
          'attr' => ['required', 'maxlength' => '6', 'placeholder'=> 'Pincode'],
          'label' =>  'Pincode'
      ]);
      $this->add('physical_height', 'text', [
          'attr' => ['maxlength' => '5', 'placeholder'=> 'height in cm'],
          'label' =>  'Physical height'
      ]);
      $this->add('physical_weight', 'text', [
          'attr' => ['maxlength' => '5', 'placeholder'=> 'weight in k.g.'],
          'label' =>  'Physical weight'
      ]);
      $this->add('physical_chest', 'text', [
          'attr' => ['maxlength' => '5', 'placeholder'=> ' in cm'],
          'label' =>  'Physical Chest'
      ]);

      $this->add('photo_url', 'file', [
          'attr'  =>  ['id' => 'photo_url', 'accept'=>'.jpg, .png', 'required', 'title'=>'Please upload a passport size photograph'],
          'label' =>  'Passport Photo'
      ]);
      $this->add('cv_url', 'file', [
          'attr'  =>  ['id' => 'cv_url', 'accept'=>'.doc, .docx, .pdf', 'required', 'title'=>'Please upload our RESUME'],
          'label' =>  'CV :'
      ]);

      $proof_details = MasterProof::lists('name', 'id')->all();
      $this->add('proof_details_id', 'select', [
             'choices' => $proof_details,
             'empty_value' => '--- Select ---',
             'label' => 'Proof of Residence :',
             'attr' => ['required'],
      ]);
      $this->add('proof_no', 'text', [
          'attr' => ['maxlength' => '100', 'placeholder'=> 'Proof/Id No ','required'],
          'label' =>  'Proof/Id No: '
      ]);

      $this->add('relocated', 'select', [
             'choices' => CandidateInfo::$relocated_options, //currentl only arunachal districts are fetched
             'empty_value' => '--- Select ---',
             'label' => 'Willing to Relocate :',
             'attr' => ['required'],
      ]);
      $this->add('bpl', 'select', [
             'choices' => ['YES'=>'YES', 'NO'=>'NO'],
             'empty_value' => '--- Select ---',
             'label' => 'Whether BPL :',
             'attr' => ['required'],
      ]);
      $this->add('adhaar_no', 'text', [
          'attr' => ['maxlength' => '100', 'placeholder'=> 'Aadhaar No '],
          'label' =>  'Aadhaar No: '
      ]);
      $this->add('additional_info', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '5', 'placeholder'=> ''],
          'label' =>  'Additional Information :'
      ]);
      // $table->string('additional_info
      // $table->string('photo_url', 200)->nullable()->comment('Photo URL');
      // $table->string('cv_url', 200)->nullable()->comment('CV URL');

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-default btn-blue btn-lg']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'my_button']
      ]);
    }
}
