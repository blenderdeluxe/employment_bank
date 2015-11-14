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

.form-group label {
  float:left;
  width:160px;
}
.form-group input[type="text"] {
  height:38px;
}

.form-group input[type="text"] {
  height:38px;
}

.clear {
  clear:both;
}

/* #### bootstrap Form #### */
.bootstrap-frm {
    margin-left:auto;
    margin-right:auto;
    background: #FFF;
    padding: 20px 30px 20px 30px;
    font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #888;
    text-shadow: 1px 1px 1px #FFF;
    border:1px solid #DDD;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;

}
.bootstrap-frm h1 {
    font: 25px "Helvetica Neue", Helvetica, Arial, sans-serif;
    padding: 0px 0px 10px 40px;
    display: block;
    border-bottom: 1px solid #DADADA;
    margin: -10px -30px 30px -30px;
    color: #888;
}
.bootstrap-frm h1>span {
    display: block;
    font-size: 11px;
}
.bootstrap-frm label {
    display: block;
    margin: 0px 0px 5px;
}
.bootstrap-frm label {
    float: left;
    width: 25%;
    text-align: right;
    padding-right: 10px;
    margin-top: 10px;
    color: #333;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: bold;
}
.bootstrap-frm input[type="text"], .bootstrap-frm input[type="email"], .bootstrap-frm textarea, .bootstrap-frm select{
    border: 1px solid #CCC;
    color: #888;
    height: 35px;
    line-height:15px;
    margin-bottom: 16px;
    margin-right: 6px;
    margin-top: 2px;
    outline: 0 none;
    padding: 5px 0px 5px 5px;
    width: 55%;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;    
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.bootstrap-frm select {
    background: #FFF url('http://www.sanwebe.com/wp-content/uploads/2013/10/down-arrow.png') no-repeat right;
    background: #FFF url('http://www.sanwebe.com/wp-content/uploads/2013/10/down-arrow.png') no-repeat right;
    appearance:none;
    -webkit-appearance:none;
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width: 55%;
    height: 35px;
    line-height:15px;
}
.bootstrap-frm textarea{
    height:100px;
    padding: 5px 0px 0px 5px;
    width: 70%;
}
.bootstrap-frm .button {
    background: #FFF;
    border: 1px solid #CCC;
    padding: 10px 25px 10px 25px;
    color: #333;
    border-radius: 4px;
}
.bootstrap-frm .button:hover {
    color: #333;
    background-color: #EBEBEB;
    border-color: #ADADAD;
}
.frm-box {
  padding: 20px;
  background: #f6f6f6;
  margin-bottom: 30px;
}
</style>
@stop

@section('content')
<div class="container">
@section('main_page_container')
  <div class="post-resume-page-title">Edit Education Details</div>
@stop
<div class="spacer-1">&nbsp;</div>
{!! form_start($form, $formOptions = ['class'=>'form-horizontal','role'=>'form']) !!}
  <div class="row" style="background-color: #ECF0F1;">
    
      <div class="bootstrap-frm"> 
        @foreach($res as $v)
          <div class="frm-box"> 
            {!! form_row($form->exam_id, $options = [ 'attr' => ['name' => 'exam_id_'.$v->id, 'class' => 'col-md-4',], 'selected' => $v->exam_id]) !!}
            <div class="clear"></div> 
            {!! form_row($form->board_id, $options = ['attr' => ['name' => 'board_id_'.$v->id,'class' => 'col-md-4',], 'selected' => $v->board_id]) !!}
            <div class="clear"></div>
            {!! form_row($form->subject_id, $options = ['attr' => ['name' => 'subject_id_'.$v->id, 'class' => 'col-md-4',], 'selected' => $v->subject_id]) !!}
            <div class="clear"></div>
            {!! form_row($form->specialization, $options = ['attr' => ['name' => 'specialization_'.$v->id, 'class' => 'col-md-4',], 'value' => $v->specialization]) !!}
            <div class="clear"></div>
            {!! form_row($form->pass_year, $options = ['attr' => ['name' => 'pass_year_'.$v->id, 'class' => 'col-md-4',], 'value' => $v->pass_year]) !!}
            <div class="clear"></div>
            {!! form_row($form->percentage, $options = ['attr' => ['name' => 'percentage_'.$v->id, 'class' => 'col-md-4',], 'value' => $v->percentage]) !!}
            <div class="clear"></div>
            <input type="hidden" name="eduIds[]" value="{{$v->id}}">
          </div>
        @endforeach
        
      </div>

      <div class="form-group col-sm-12 text-center" style="margin-top:40px;">
          <button class="my_button"> Save >> </button>
        </div>
    </div>
    {!! form_end($form) !!}
</div>

</div>
@stop