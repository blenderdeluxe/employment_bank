<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\Exam;
use employment_bank\Models\Board;
use employment_bank\Models\Subject;


class CandidateEdu_detailsForm extends Form{

    public function buildForm(){

      $this->add('exam_id', 'select', [
             'choices' => Exam::lists('name', 'id')->all(),
             'empty_value' => '--- Select ---',
             'label' => 'Exam :',
             'attr' => ['required'],
      ]);

      $this->add('board_id', 'select', [
             'choices' => Board::lists('name', 'id')->all(),
             'empty_value' => '--- Select ---',
             'label' => 'Board/university :',
             'attr' => ['required'],
      ]);
      $this->add('subject_id', 'select', [
             'choices' => Subject::lists('name', 'id')->all(),
             'empty_value' => '--- Select ---',
             'label' => 'Subject/Trade :',
             'attr' => [],
      ]);

      $this->add('specialization', 'text', [
          'attr' => ['maxlength' => '50', 'placeholder'=> 'Specialization if any e.g. biology/chemistry'],
          'label' =>  'Specialization'
      ]);

      // $this->add('pass_year', 'text', [
      //     'attr' => ['maxlength' => '4', 'placeholder'=> 'year of passing'],
      //     'label' =>  'Pass Year'
      // ]);

      $this->add('pass_year', 'text', [
          'attr' => ['maxlength' => '4', 'placeholder'=> 'year of passing'],
          'label' =>  'Pass Year'
       ]);

      
      $this->add('percentage', 'text', [
          'attr' => ['maxlength' => '5', 'placeholder'=> 'Percentage of marks'],
          'label' =>  'Percentage'
      ]);

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-default btn-blue btn-lg']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-success col-md-12']
      ]);
    }
}
