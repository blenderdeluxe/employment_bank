<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\CandidateInfo;

class CandidateEdu_detailsForm extends Form{

    public function buildForm(){

      $this->add('fullname', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'Full Name'],
          'label' =>  'Full Name :'
      ]);

      $this->add('sex', 'select', [
             'choices' => CandidateInfo::$sex_options,
             'empty_value' => '--- Select ---',
             'label' => 'Sex :',
             'attr' => ['required'],
      ]);

      $this->add('address', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '5', 'placeholder'=> 'Address details'],
          'label' =>  'Address'
      ]);


      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-default btn-blue btn-lg']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-success col-md-12']
      ]);
    }
}
