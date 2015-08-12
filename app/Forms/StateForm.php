<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;

class StateForm extends Form{

    public function buildForm(){

      $this->add('name', 'text', [
          'attr' => ['required', 'maxlength' => '100', 'placeholder'=> 'name of the State'],
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
