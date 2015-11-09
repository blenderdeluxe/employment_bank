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

@section('content-header')

@stop

@section('main_page_container')
  <div class="post-resume-page-title">Post a Resume</div>
  <div class="post-resume-phone">Call: 97999 49999</div>
@stop

@section('content')
<div class="container">
<div class="spacer-1">&nbsp;</div>
{!! form_start($form, $formOptions = ['class'=>'form-horizontal','role'=>'form']) !!}
  <div class="row" style="background-color: #ECF0F1;">
    <div class="col-md-6 aug_group">
      <div class="form-group aug_legend">
          Personal Information:
      </div>
          <div class="form-group aug-form-group-sm">
              <label for="fullname" class="col-sm-5 control-label">Full Name :</label>
              <div class="col-sm-7">
                  {!! form_widget($form->fullname) !!}
              </div>
          </div>

          <div class="form-group aug-form-group-sm">
              <label for="guar_name" class="col-sm-5 control-label">Guardian Name :</label>
              <div class="col-sm-7">
                  {!! form_widget($form->guar_name) !!}
              </div>
          </div>

          <div class="form-group aug-form-group-sm">
              <label for="spouse_name" class="col-sm-5 control-label">Spouse Name :</label>
              <div class="col-sm-7">
                  {!! form_widget($form->spouse_name) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="dob" class="col-sm-5 control-label">Date of Birth :</label>
              <div class="col-sm-3">
                  {!! form_widget($form->dob) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="sex" class="col-sm-5 control-label">Gender :</label>
              <div class="col-sm-3">
                  {!! form_widget($form->sex) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="caste_id" class="col-sm-5 control-label">Caste :</label>
              <div class="col-sm-4">
                  {!! form_widget($form->caste_id) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="religion" class="col-sm-5 control-label">Religion :</label>
              <div class="col-sm-4">
                  {!! form_widget($form->religion) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="marital_status" class="col-sm-5 control-label">Marital Status :</label>
              <div class="col-sm-4">
                  {!! form_widget($form->marital_status) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="physical_challenge" class="col-sm-5 control-label">Physically challenged :</label>
              <div class="col-sm-4">
                  {!! form_widget($form->physical_challenge) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="ex_service" class="col-sm-5 control-label">Whether Ex-serviceman :</label>
              <div class="col-sm-4">
                  {!! form_widget($form->ex_service) !!}
              </div>
          </div>

    </div>

    <div class="col-md-6 aug_group">
      <div class="form-group aug_legend">
          Contact Information:
      </div>
          <div class="form-group aug-form-group-sm">
              <label for="address" class="col-sm-3 control-label">Address :</label>
              <div class="col-sm-9">
                  {!! form_widget($form->address) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="state_id" class="col-sm-3 control-label">State :</label>
              <div class="col-sm-5">
                  {!! form_widget($form->state_id) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="district_id" class="col-sm-3 control-label">District :</label>
              <div class="col-sm-5">
                  {!! form_widget($form->district_id) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="pincode" class="col-sm-3 control-label">Pincode :</label>
              <div class="col-sm-4">
                  {!! form_widget($form->pincode) !!}
              </div>
          </div>
    </div>

    <div class="col-md-6 aug_group">
      <br/>
      <div class="form-group aug_legend">
          Physical Measurement:
      </div>
      <div class="col-md-12">
          <div class="form-group aug-form-group-sm col-md-6">
              <label for="physical_height" class="col-md-5 control-label">Height :</label>
              <div class="col-md-7">
                  {!! form_widget($form->physical_height) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm col-md-6">
              <label for="physical_weight" class="col-md-5 control-label">Weight :</label>
              <div class="col-md-7">
                  {!! form_widget($form->physical_weight) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm col-md-6">
              <label for="physical_chest" class="col-md-5 control-label">Chest :</label>
              <div class="col-md-7">
                  {!! form_widget($form->physical_chest) !!}
              </div>
          </div>
      </div>

    </div>

    <div class="col-md-12 aug_group">
      <div class="form-group aug_legend">
          Additional Information :
      </div>
      <div class="col-md-12">
          <div class="form-group aug-form-group-sm col-md-3">
              <label for="proof_details_id" > Proof of Residence :</label>
                  {!! form_widget($form->proof_details_id) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-3">
              <label for="proof_no">Proof/Id No :</label>
                  {!! form_widget($form->proof_no) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-3">
              <label for="relocated">Willing to Relocate :</label>
                  {!! form_widget($form->relocated) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-3">
              <label for="bpl">Whether BPL :</label>
                  {!! form_widget($form->bpl) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-8">
              <label for="additional_info">Additional Info :</label>
                  {!! form_widget($form->additional_info) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-4">
              <label for="adhaar_no">Adhaar No :</label>
                  {!! form_widget($form->adhaar_no) !!}
          </div>

      </div>
    </div>

    <div class="col-md-6 aug_group">
      <div class="form-group aug_legend"> Photo / CV : </div>
          <div class="form-group aug-form-group-sm">
              <label for="photo_url" class="col-sm-3 control-label"> Photo :</label>
              <div class="col-sm-9">
                  {!! form_widget($form->photo_url) !!}
              </div>
          </div>
          <div class="form-group aug-form-group-sm">
              <label for="cv_url" class="col-sm-3 control-label">CV :</label>
              <div class="col-sm-9">
                  {!! form_widget($form->cv_url) !!}
                  <p class="help-block">Upload pdf or .doc format only</p>
              </div>
          </div>
      </div>

      <div class="form-group col-sm-12 text-center">
        <button class="my_button"> Update changes >> </button>
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

<script src="{{ URL::asset('plugins/jQueryUI/jquery-ui.min.js') }}" type="text/javascript"></script>
@stop

@section('page_specific_scripts')

  $('#photo_url').removeAttr('required');
  $('#cv_url').removeAttr('required');


$( "._date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        defaultDate: "-22Y",
        //yearRange: "-26:+0",
        autoSize: true,
        dateFormat: "dd-mm-yy",
        //minDate: '-26Y',
        maxDate: "-16Y"
  });

@stop
