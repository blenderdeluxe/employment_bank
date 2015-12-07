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
      <div class="form-group aug_legend"> Language Details : </div>
      <div class="col-md-12"></div>
      @foreach($res as $v)
      <div class="_details">

          <div class="form-group aug-form-group-sm col-md-4">
              <label for="experience_id" class="control-label">Language :</label>
              {!! Form::select('language_id_'.$v->id, $languages, $v->language_id, ['id'=>'language_id', 'class' => 'form-control', 'required']) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-2">
              <label for="can_read" class="control-label">Read :</label>
              {!! Form::select('can_read_'.$v->id, ['YES'=>'YES','NO'=>'NO'], $v->can_read, ['class'=>'form-control', 'required']) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-2">
              <label for="can_write" class="control-label">Write :</label>
              {!! Form::select('can_write_'.$v->id, ['YES'=>'YES','NO'=>'NO'], $v->can_write, ['class'=>'form-control', 'required']) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-2">
              <label for="can_speak" class="control-label">Speak :</label>
              {!! Form::select('can_speak_'.$v->id, ['YES'=>'YES','NO'=>'NO'], $v->can_speak, ['class'=>'form-control', 'required']) !!}
          </div>
          <div class="form-group aug-form-group-sm col-md-2">
              <label for="can_speak_fluently" class="control-label">Speak Fluently :</label>
              {!! Form::select('can_speak_fluently_'.$v->id, ['YES'=>'YES','NO'=>'NO'], $v->can_speak_fluently, ['class'=>'form-control', 'required']) !!}
          </div>
          <input type="hidden" name="langIds[]" value="{{$v->id}}">
      </div>
      @endforeach
    </div>
    <!--
    <div class="form-group">
      <button id="add" class="btn btn-sm" type="button"> <i class="fa fa-plus"></i> Add New
		  </button>
      <button id="minus" class="btn btn-sm" type="button"> <i class="fa fa-minus"></i> Remove
			</button>
    </div>
    -->

      <div class="form-group col-sm-12 text-center" style="margin-top:40px;">
        <button class="my_button"> Save >> </button>
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
		$("._details:first").clone(true).appendTo('#edu_details').find('input, select').val('NO');
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
