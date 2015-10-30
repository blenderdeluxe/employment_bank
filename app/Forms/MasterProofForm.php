<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;

class MasterProofForm extends Form{

    public function buildForm(){

      $this->add('name', 'text', [
          'attr' => ['required', 'maxlength' => '100', 'placeholder'=> 'name of the Proof '],
          'wrapper' => ['class' => 'form-group']
      ]);

      $this->add('details', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '5', 'placeholder'=> 'additional details of the Proof of Residense'],
          'wrapper' => ['class' => 'form-group'] // Shows the wrapper for each e
          //'wrapper' => ['class' => 'form-group col-md-6'] // Shows the wrapper for each e
      ]);

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-primary col-md-12']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-success col-md-12']
      ]);
    }
}
