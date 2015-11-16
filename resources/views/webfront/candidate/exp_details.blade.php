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
  <div class="post-resume-page-title">Fill up Experience Details</div>
  <div class="post-resume-phone">Call: 97999 49999</div>
@stop

@section('content')
<div class="container">
<div class="spacer-1">&nbsp;</div>
{!! Form::open(['route'=>$url, 'role'=>'form']) !!}
  <div class="row" style="background-color: #ECF0F1;">

    <div id="edu_details" class="col-md-12 aug_group">
      <div class="form-group aug_legend"> Experience Details : </div>
      <div class="col-md-12"></div>
      <div class="row _details">
        <div class="form-group aug-form-group-sm col-md-4">
            <label for="employers_name" class="control-label">Employer's Name :</label>
            {!! Form::text('employers_name[]', '', ['id'=>'employers_name', 'class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group aug-form-group-sm col-md-4">
            <label for="post_held" class="control-label">Position Held :</label>
            {!! Form::text('post_held[]', '', ['id'=>'post_held', 'class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group aug-form-group-sm col-md-2">
            <label for="year_experience" class="control-label">Years of Experience :</label>
            {!! Form::number('year_experience[]', '', ['maxlength'=>'3', 'id'=>'year_experience', 'class' => 'form-control', 'required']) !!}
        </div>
          <div class="form-group aug-form-group-sm col-md-2">
              <label for="salary" class="control-label">Salary :</label>
              {!! Form::number('salary[]', '', ['id' =>'salary_drawn', 'class' => 'form-control', 'required']) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-4">
              <label for="experience_id" class="control-label">Exp Type :</label>
              {!! Form::select('experience_id[]', $subjects, '', ['class'=>'form-control', 'required']) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-4">
              <label for="percentage" class="control-label">Sector :</label>
              {!! Form::select('industry_id[]', $sectors, '', ['class'=>'form-control', 'required']) !!}
          </div>

      </div>
    </div>

    <div class="form-group">
      <button id="add" class="btn btn-sm" type="button"> <i class="fa fa-plus"></i> Add New
		  </button>
      <button id="minus" class="btn btn-sm" type="button"> <i class="fa fa-minus"></i> Remove
			</button>
    </div>

      <div class="form-group col-sm-12 text-center" style="margin-top:40px;">
        <button class="my_button"> Save and Proceed to Next Step >> </button>
      </div>
  </div>
  {!! Form::close() !!}
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
<script type="text/javascript">

  function addRow() {
		$("._details:first").clone(true).appendTo('#edu_details').find('input, select').val('');
    //$("._details:first").clone(true).appendTo('#edu_details').find('.datepicker').val('');
	}
  function removeRow() {
		if($("._details").length!=1)
			$("._details").last().remove()
	}
</script>
@stop
@section('page_specific_scripts')

  $('#add').on('click', function(e){
		    e.preventDefault();
		    addRow();
	});
  $('#minus').on('click', function(e){
  		  e.preventDefault();
  		  removeRow();
  });
@stop
