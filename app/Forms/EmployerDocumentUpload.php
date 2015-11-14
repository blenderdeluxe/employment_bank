<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\Exam;
use employment_bank\Models\IndustryType;
use employment_bank\Models\State;
use employment_bank\Models\Caste;
use employment_bank\Models\Subject;
//use employment_bank\Models\Subject;

class EmployerDocumentUpload extends Form{

    public function buildForm(){

      $this->add('doc_type', 'select', [
             'choices' => ['pan_card'=>'PAN CARD', 'company_firm_rc'=>'Company/firm Registration certificate', 'trade_license'=>'Trade License', 'govt_dept_rc'=>'Govt Department Registration Certificate', 'others'=>'Others'],
             'empty_value' => '--- Select ---',
             'label' => 'Type of Document',
             'attr' => ['required'],
             'wrapper' => ['class' => 'form-group col-md-6'] // Shows the wrapper for each e
      ]);

      $this->add('document', 'file', [
          'attr'  =>  ['id' => 'document', 'accept'=>'.jpg, .jpeg, .png, .bmp, .wbmp', 'required', 'title'=>'Please upload a scanned copy of the original document'],
          'label' =>  'File',
          'wrapper' => ['class' => 'form-group col-md-6']
      ]);

      $this->add('description', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '3', 'placeholder'=> 'additional note/details of the document'],
          'wrapper' => ['class' => 'form-group col-md-12'] // Shows the wrapper for each e
      ]);

      $this->add('Submit', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-primary col-md-3']
      ]);

    }
}
