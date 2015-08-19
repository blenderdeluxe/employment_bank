<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\State;

class DistrictForm extends Form{

    public function buildForm(){

      $states = State::lists('name', 'id')->all();

      $this->add('state_id', 'select', [
             'choices' => $states,
             'empty_value' => '==== Select State ===',
             'label' => 'State',
             'attr' => ['required'],
      ]);

      $this->add('name', 'text', [
          'attr' => ['required', 'maxlength' => '100', 'placeholder'=> 'name of the District'],
          'wrapper' => ['class' => 'form-group']
      ]);

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-primary col-md-12']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-success col-md-12']
      ]);
    }
}
