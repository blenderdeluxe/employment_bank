<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\State;
use employment_bank\Models\District;
use employment_bank\Models\Employer;
use employment_bank\Models\IndustryType;

class EmployerForm extends Form{

    public function buildForm(){

      $this->add('organization_name', 'text', [
          'attr' => ['required', 'maxlength' => '255', 'placeholder'=> 'Organization Name'],
          'label' =>  'Organization Name :'
      ]);
      $this->add('organization_type', 'select', [
          'choices' => Employer::$organization_type_options,
          'empty_value' => '--- Select ---',
          'attr' => ['required'],
          'label' =>  'Type of Organization :'
      ]);
      $this->add('organization_sector', 'select', [
          'choices' => Employer::$organization_sector_options,
          'empty_value' => '--- Select ---',
          'attr' => ['required'],
          'label' =>  'Organization Sector :'
      ]);

      $this->add('industry_id', 'select', [
          'choices' => IndustryType::lists('name', 'id')->all(),
          'empty_value' => '--- Select ---',
          'attr' => ['required'],
          'label' =>  'Industry :'
      ]);

      $this->add('address', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '5', 'placeholder'=> 'Address details', 'required'],
          'label' =>  'Address'
      ]);
      $states = State::lists('name', 'id')->all();
      $this->add('state_id', 'select', [
             'choices' => $states, //currentl only arunachal
             //'empty_value' => '--- Select ---',
             'label' => 'State',
             'attr' => ['required','id' => 'state_id',],
      ]);
      //$districts = District::lists('name', 'id')->all();
      $this->add('district_id', 'select', [
             'choices' => [''=>'-- Select State first--'], //currentl only arunachal districts are fetched
             //'empty_value' => '--- Select ---',

             'label' => 'District',
             'attr' => ['required', 'id'  => 'district_id'],
      ]);
      $this->add('pincode', 'text', [
          'attr' => ['required', 'maxlength' => '6', 'placeholder'=> 'Pincode'],
          'label' =>  'Pincode'
      ]);

      $this->add('phone_no_ext', 'text', [
          'attr' => ['required', 'maxlength' => '5', 'style'=>'float:left;width:28%;'],
          'label' =>  'Phone No extension'
      ]);
      $this->add('phone_no_main', 'text', [
          'attr' => ['required', 'maxlength' => '10', 'style'=>'float:left;width:70%;margin-left:3px;'],
          'label' =>  'Phone No'
      ]);

      $this->add('organisation_email', 'email', [
          'attr' => ['required', 'maxlength' => '100', 'placeholder'=> 'Organization Email'],
          'label' =>  'Organization Email :'
      ]);
      $this->add('web_address', 'text', [
          'attr' => ['maxlength' => '255', 'placeholder'=> 'Organization Web Address URL'],
          'label' =>  'Organization Web Address URL :'
      ]);

      $this->add('contact_name', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'Contact person name'],
          'label' =>  'Contact Person name :'
      ]);

      $this->add('contact_designation', 'text', [
          'attr' => ['required', 'maxlength' => '50', 'placeholder'=> 'Contact person designation'],
          'label' =>  'Designation :'
      ]);
      $this->add('contact_mobile_no', 'text', [
          'attr' => ['required', 'maxlength' => '10', 'placeholder'=> 'Contact person mobile no'],
          'label' =>  'Mobile No :'
      ]);
      $this->add('contact_email', 'email', [
          'attr' => ['required', 'maxlength' => '255', 'placeholder'=> 'Contact person email id'],
          'label' =>  'E mail :'
      ]);

      $this->add('save', 'submit', [
          'attr' => ['class'=>'btn btn-default btn-blue btn-lg']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'my_button']
      ]);
    }
}
