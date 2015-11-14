<?php namespace employment_bank\Forms;

use Kris\LaravelFormBuilder\Form;
use employment_bank\Models\Exam;
use employment_bank\Models\IndustryType;
use employment_bank\Models\State;
use employment_bank\Models\Caste;
use employment_bank\Models\Subject;
//use employment_bank\Models\Subject;

class JobCreateForm extends Form{

    public function buildForm(){

      $this->add('post_name', 'text', [
          'attr' => ['required', 'maxlength' => '255', 'placeholder'=> 'name of the POST', 'title'=>'name of the position'],
          'wrapper' => ['class' => 'form-group-sm col-md-5'] // Shows the wrapper for each e
      ]);
      $this->add('no_of_post', 'number', [
          'attr' => ['required', 'maxlength' => '3', 'placeholder'=> 'no of vacancy', 'title'=>'total position vacant'],
          'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper for each e
      ]);
      $this->add('industry_id', 'select', [
          'choices' => IndustryType::lists('name', 'id')->all(),
          'empty_value' => '--- Select ---',
          'attr' => ['required'],
          'label' =>  'Industry :',
          'wrapper' => ['class' => 'form-group-sm col-md-4']
      ]);

      $this->add('place_of_employment_state_id', 'select', [
             'choices' => State::lists('name', 'id')->all(), //currentl only arunachal
             'empty_value' => '--- Select ---',
             'label' => 'Place of Employment State',
             'attr' => ['required', 'id'=>'place_of_employment_state_id'],
             'wrapper' => ['class' => 'form-group-sm col-md-4']
      ]);

      $districts = [''=>'-- Select State first--'];
      $this->add('place_of_employment_district_id', 'select', [
             'choices' => $districts, //currentl only arunachal districts are fetched
             'label' => 'District',
             'attr' => ['required', 'id'  => 'place_of_employment_district_id', 'required'],
             'wrapper' => ['class' => 'form-group-sm col-md-4']
      ]);

      // ->add('some_choices', 'choices', [
      //            'choices' => $this->getData('post_choices')     // When form is created passed as ->setData('post_choices', ['some' => 'array'])
      //        ])

      $this->add('place_of_employment_city', 'text', [
          'attr' => ['maxlength' => '255', 'placeholder'=> 'City'],
          'wrapper' => ['class' => 'form-group-sm col-md-4'] // Shows the wrapper for each e
      ]);

      $this->add('salary_offered_min', 'text', [
          'attr' => ['required', 'maxlength' => '8', 'placeholder'=> 'salary offered min'],
          'wrapper' => ['class' => 'form-group-sm col-md-4'], // Shows the wrapper for each e
          'label'   =>  'Salary Offered Min. (monthly)'
      ]);
      $this->add('salary_offered_max', 'text', [
          'attr' => ['required', 'maxlength' => '8', 'placeholder'=> 'salary offered max'],
          'wrapper' => ['class' => 'form-group-sm col-md-4'],
          'label'   =>  'Salary Offered Max. (monthly)'
      ]);

      $this->add('other_benefits', 'text', [
          'attr' => [ 'maxlength' => '8', 'placeholder'=> 'salary other_benefits'],
          'wrapper' => ['class' => 'form-group-sm col-md-4'], // Shows the wrapper for each e
          'label'   =>  'Other Benefits (annual)'
      ]);

      $this->add('preferred_age_min', 'number', [
          'attr' => ['required', 'maxlength' => '2', 'placeholder'=> 'preferred_age_min', 'min'=>"15", 'max'=>"99"],
          'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper for each e
      ]);

      $this->add('preferred_age_max', 'number', [
          'attr' => ['required', 'maxlength' => '2', 'placeholder'=> 'preferred_age_max', 'min'=>"15", 'max'=>"99"],
          'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper for each e
      ]);
      $casts = ['ANY'=>'ANY'] + Caste::lists('name', 'id')->all();
      $this->add('preferred_caste', 'select', [
              'choices' => $casts,
              'empty_value' => '==== Select ===',
              'label' => 'Preferred Caste',
              'attr' => ['required'],
              'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper default is false
      ]);

      // $relegions = ['ANY'=>'ANY','BUDDHISM'=>'BUDDHISM', 'CHRISTIANITY'=>'CHRISTIANITY','HINDUISM'=>'HINDUISM','ISLAM'=>'ISLAM',
      //     'JAINISM'=>'JAINISM','PARSI'=>'PARSI','SIKHISM'=>'SIKHISM', 'OTHERS'=>'OTHERS', 
      // ];
      // $this->add('preferred_relegion', 'select', [
      //         'choices' => $relegions,
      //         'empty_value' => '==== Select ===',
      //         'label' => 'Preferred Relegion',
      //         'attr' => ['required'],
      //         'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper default is false
      // ]);

      $job_sub_categories = ['Govt. Regular'=>'Govt. Regular', 'Govt. Contractual'=>'Govt. Contractual', 'Pvt. Regular'=>'Pvt. Regular','Pvt. Contractual'=>'Pvt. Contractual', 'Not Specified'=>'Not Specified'];
      $this->add('job_sub_category', 'select', [
              'choices' => $job_sub_categories,
              'empty_value' => ' ==== Select === ',
              'label' => 'Job Category',
              'attr' => ['required'],
              'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper default is false
      ]);

      $genders = ['ANY'=>'ANY', 'MALE'=>'MALE', 'FEMALE'=>'FEMALE','OTHERS'=>'OTHERS', ];
      $this->add('preferred_sex', 'select', [
              'choices' => $genders,
              'empty_value' => '==== Select ===',
              'label' => 'Preferred Sex',
              'attr' => ['required'],
              'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper default is false
      ]);
      $job_types = ['Full Time'=>'Full Time', 'Part Time'=>'Part Time'];
      $this->add('job_type', 'select', [
              'choices' => $job_types,
              'empty_value' => '-- Select --',
              'label' => 'Job Type',
              'attr' => ['required'],
              'wrapper' => ['class' => 'form-group-sm col-md-2'] // Shows the wrapper default is false
      ]);

      $this->add('exam_passed_id', 'select', [
             'choices' => Exam::lists('name', 'id')->all(),
             'empty_value' => '--- Select ---',
             'label' => 'Exam Passed :',
             'attr' => ['required'],
             'wrapper'  =>  ['class'=> 'form-group-sm col-md-3']
      ]);
      $this->add('subject_id', 'select', [
             'choices' => Subject::lists('name', 'id')->all(),
             'empty_value' => '--- Select ---',
             'label' => 'Subject/Trade :',
             //'attr' => ['required'],
             'wrapper'  =>  ['class'=> 'form-group-sm col-md-4']
      ]);


      $this->add('specialization', 'text', [
          'attr' => ['maxlength' => '50', 'placeholder'=> 'specialization'],
          'wrapper' => ['class' => 'form-group-sm col-md-4'] // Shows the wrapper for each e
      ]);

      $this->add('preferred_experience', 'number', [
          'attr' => ['maxlength' => '2', 'placeholder'=> 'preferred years of expereince'],
          'wrapper' => ['class' => 'form-group-sm col-md-2'] // Shows the wrapper for each e
      ]);


      $this->add('ex_service', 'select', [
             'choices' => ['YES'=>'YES', 'NO'=>'NO'],
             'empty_value' => '--- Select ---',
             'label' => 'Ex-serviceman',
             'attr' => ['required'],
             'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper for each e
      ]);
      $this->add('physical_challenge', 'select', [
             'choices' => ['YES'=>'YES', 'NO'=>'NO'],
             'empty_value' => '--- Select ---',
             'label' => 'Physically Challenged',
             'attr' => ['required'],
             'wrapper' => ['class' => 'form-group-sm col-md-3'] // Shows the wrapper for each e
      ]);

      $this->add('physical_height', 'text', [
          'attr' => ['maxlength' => '5', 'placeholder'=> 'height in cm'],
          'label' =>  'Physical height',
          'wrapper' => ['class' => 'form-group-sm col-md-4'] // Shows the wrapper for each e
      ]);
      $this->add('physical_weight', 'text', [
          'attr' => ['maxlength' => '5', 'placeholder'=> 'weight in k.g.'],
          'label' =>  'Physical weight',
          'wrapper' => ['class' => 'form-group-sm col-md-4'] // Shows the wrapper for each e
      ]);
      $this->add('physical_chest', 'text', [
          'attr' => ['maxlength' => '5', 'placeholder'=> ' in cm'],
          'label' =>  'Physical Chest',
          'wrapper' => ['class' => 'form-group-sm col-md-4'] // Shows the wrapper for each e
      ]);

      $this->add('description', 'textarea', [
          'attr' => ['maxlength' => '255', 'rows' => '3', 'placeholder'=> 'additional note/details of the job'],
          'wrapper' => ['class' => 'form-group col-md-12'] // Shows the wrapper for each e
      ]);

      $this->add('Submit', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-primary col-md-12']
      ]);

      $this->add('update', 'submit', [
          'attr' => ['class'=>'btn btn-lg btn-success col-md-12']
      ]);
    }
}
