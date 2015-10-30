<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;

class DepartmentTypeForm extends Form{

    public function buildForm(){

      $this->add('name', 'text', [
          'attr' => ['required', 'maxlength' => '255', 'placeholder'=> 'name of the Department'],
          'wrapper' => ['class' => 'form-group'] // Shows the wrapper for each e
      ]);
      $this->add('description', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '5', 'placeholder'=> 'additional note/details of the Department'],
          'wrapper' => ['class' => 'form-group'] // Shows the wrapper for each e
      ]);

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-primary col-md-12']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-success col-md-12']
      ]);
    }
}
