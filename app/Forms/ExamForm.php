<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\Exam;
class ExamForm extends Form{

    public function buildForm(){

      $this->add('name', 'text', [
          'attr' => ['required', 'maxlength' => '255', 'placeholder'=> 'name of the Exam'],
          'wrapper' => ['class' => 'form-group col-md-6'] // Shows the wrapper for each e
      ]);

      $this->add('exam_category', 'select', [
              'choices' => Exam::$exam_exam_categories,
              'empty_value' => '==== Select Exam Category ===',
              'label' => 'Exam Category',
              'attr' => ['required'],
              'wrapper' => ['class' => 'form-group col-md-6'] // Shows the wrapper default is false
      ]);

      $this->add('description', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '5', 'placeholder'=> 'additional note/details of the Exam'],
          'wrapper' => ['class' => 'form-group col-md-12'] // Shows the wrapper for each e
      ]);

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-primary col-md-12']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-success col-md-12']
      ]);
    }
}
