@extends('webfront.layouts.default')

@section('page_specific_styles')
<link href="{{ asset('plugins/jQueryUI/jquery-ui-1.10.3.custom.min.css')}}" rel="stylesheet" type="text/css" />

<style>
.form-horizontal .form-group {
    margin-right: 0px !important;
}
.aug_group{
  /*background-color: #ECF0F1;*/
}
.aug_legend{
  /*width: 100%;*/
  font-family: Verdana, Geneva, Tahoma, Arial, Helvetica, sans-serif;
  display: inline-block;
  color: #FFFFFF;
  /*background-color: #8AC007;*/
  background-color: #1abc9c;
  font-size: 15px;
  text-align: center;
  padding: 5px 16px;
  text-decoration: none;
  /*margin-left: -15px;
  margin-right: 15px;*/
  margin-top: 0px;
  margin-bottom: 10px;
  /*border: 1px solid #8AC007;*/
  white-space: nowrap;
}
</style>
@stop

@section('content')
<div class="container">
<div class="spacer-1">&nbsp;</div>
{!! form_start($form, $formOptions = ['class'=>'form-horizontal','role'=>'form']) !!}
  <div class="row" style="background-color: #ECF0F1;">
    <div class="col-md-12 aug_group">
      <div class="form-group aug_legend">
          Educational Information:
      </div>
    </div>

      <div class="form-group aug-form-group-sm col-md-4">
          <label for="exam_id" class="control-label"> Exam Passed: </label>
          {!! form_widget($form->exam_id) !!}
      </div>

      <div class="form-group aug-form-group-sm col-md-4">
          <label for="board_id" class="control-label"> Board/university :</label>
          {!! form_widget($form->board_id) !!}
      </div>

      <div class="form-group aug-form-group-sm col-md-4">
          <label for="subject_id" class="control-label">Subject/Trade :</label>
          {!! form_widget($form->subject_id) !!}
      </div>
      <div class="form-group aug-form-group-sm col-md-4">
          <label for="specialization" class="control-label">Specialization :</label>
          {!! form_widget($form->specialization) !!}
      </div>
      <div class="form-group aug-form-group-sm col-md-4">
          <label for="pass_year" class="control-label">Year of Passing :</label>
          {!! form_widget($form->pass_year) !!}
        
      </div>
      <div class="form-group aug-form-group-sm col-md-4">
          <label for="percentage" class="control-label">% of marks :</label>
          {!! form_widget($form->percentage) !!}
      </div>

    </div>
</div>
{!! form_end($form) !!}
</div>
@stop