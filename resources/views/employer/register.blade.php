@extends('employer.layouts.public')

@section('page_specific_styles')
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
@section('content-header')
    Employer's Portal <small>New Enrolment</small>
@stop
@section('breadcrumb')
<li><a href="#"><i class="fa fa-building"></i> Employer</a></li><li class="active">New Enrolment</li>
@stop

@section('main_page_container')

@stop

@section('content')
<div class="container">
<div class="spacer-1">&nbsp;</div>
{!! form_start($form, $formOptions = ['class'=>'form-horizontal','role'=>'form']) !!}
  <div class="row" style="background-color: #ECF0F1;">
    <div class="col-md-6 aug_group">
      <div class="form-group aug_legend">
          Employer Information:
      </div>
          <div class="form-group aug-form-group-sm">
              <label for="organization_name" class="col-sm-4 control-label">Organisation Name :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->organization_name) !!}
              </div>
          </div>

          <div class="form-group aug-form-group-sm">
              <label for="organization_type" class="col-sm-4 control-label">Type of Organisation :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->organization_type) !!}
              </div>
          </div>

          <div class="form-group aug-form-group-sm">
              <label for="organization_sector" class="col-sm-4 control-label">Organisation Sector :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->organization_sector) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="industry_id" class="col-sm-4 control-label">Industry :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->industry_id) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="address" class="col-sm-4 control-label">Address :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->address) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="state_id" class="col-sm-4 control-label">State :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->state_id) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="district_id" class="col-sm-4 control-label">District :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->district_id) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="pincode" class="col-sm-4 control-label"> Pincode :</label>
              <div class="col-sm-5">
                  {!! form_widget($form->pincode) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="phone_no_main" class="col-sm-4 control-label">Phone No :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->phone_no_ext) !!}
                  {!! form_widget($form->phone_no_main) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="organisation_email" class="col-sm-4 control-label">E-mail address :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->organisation_email) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="web_address" class="col-sm-4 control-label">Web Address URL :</label>
              <div class="col-sm-8">
                  {!! form_widget($form->web_address) !!}
              </div>
          </div>

    </div>

    <div class="col-md-6 aug_group">
      <div class="form-group aug_legend">
          Contact Person Information:
      </div>
          <div class="form-group aug-form-group-sm">
              <label for="contact_name" class="col-sm-3 control-label">Name :</label>
              <div class="col-sm-9">
                  {!! form_widget($form->contact_name) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="contact_designation" class="col-sm-3 control-label">Designation :</label>
              <div class="col-sm-9">
                  {!! form_widget($form->contact_designation) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="contact_mobile_no" class="col-sm-3 control-label">Mobile No :</label>
              <div class="col-sm-9">
                  <div class="input-group">
                    {!! form_widget($form->contact_mobile_no) !!}
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  </div>
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="contact_email" class="col-sm-3 control-label">E-mail ID :</label>
              <div class="col-sm-9">
                <div class="input-group">
                  {!! form_widget($form->contact_email) !!}
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                </div>
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="pincode" class="col-sm-3 control-label">Password :</label>
              <div class="col-sm-9">
                <div class="input-group">
                  {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required', 'autocomplete'=>'off']) !!}
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                </div>
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="pincode" class="col-sm-3 control-label">Retype Password :</label>
              <div class="col-sm-9">
                  <div class="input-group">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Retype password', 'required', 'autocomplete'=>'off']) !!}
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  </div>
              </div>
          </div>

    </div>
    <div class="col-md-12">
      <div class="form-group col-sm-12 text-center">
        <button class="btn btn-block btn-primary btn-flat"> Register >> </button>
      </div>
    </div>
  </div>
  {!! form_end($form) !!}
</div>
@stop

@section('page_content')
<!-- <div class="content-about">
  <div id="cs">
    <div class="container">
    <div class="spacer-1">&nbsp;</div>
      <h1>Hey Friends Any Quries?</h1>
      <p>
        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt.
      </p>
      <h1 class="phone-cs">Call: 1 800 000 500</h1>
    </div>
  </div>
</div> -->
@stop

@section('page_specific_js')

@stop

@section('page_specific_scripts')
@stop
