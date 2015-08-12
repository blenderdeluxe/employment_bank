<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\Caste;
use employment_bank\Models\State;
use employment_bank\Models\CandidateInfo;

class CandidateInfoForm extends Form{

    public function buildForm(){

      $this->add('fullname', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'Full Name'],
          'label' =>  'Full Name :'
      ]);
      $this->add('guar_name', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'Full Name'],
          'label' =>  'Father’s / Mother’s Name :'
      ]);

      $this->add('spouse_name', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'Spouse Name'],
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

      $states = State::lists('name', 'id')->all();

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-primary col-md-12']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-success col-md-12']
      ]);
    }
}
