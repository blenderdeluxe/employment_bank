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

/* Basic Grey */
.basic-grey {
    margin-left:auto;
    margin-right:auto;
    max-width: 500px;
    background: #F7F7F7;
    padding: 25px 15px 25px 10px;
    font: 12px Georgia, "Times New Roman", Times, serif;
    color: #888;
    text-shadow: 1px 1px 1px #FFF;
    border:1px solid #E4E4E4;
}
.basic-grey h1 {
    font-size: 25px;
    padding: 0px 0px 10px 40px;
    display: block;
    border-bottom:1px solid #E4E4E4;
    margin: -10px -15px 30px -10px;;
    color: #888;
}
.basic-grey h1>span {
    display: block;
    font-size: 11px;
}
.basic-grey label {
    display: block;
    margin: 0px;
}
.basic-grey label>span {
    float: left;
    width: 20%;
    text-align: right;
    padding-right: 10px;
    margin-top: 10px;
    color: #888;
}
.basic-grey input[type="text"], .basic-grey input[type="email"], .basic-grey textarea, .basic-grey select {
    border: 1px solid #DADADA;
    color: #888;
    height: 30px;
    margin-bottom: 16px;
    margin-right: 6px;
    margin-top: 2px;
    outline: 0 none;
    padding: 3px 3px 3px 5px;
    width: 70%;
    font-size: 12px;
    line-height:15px;
    box-shadow: inset 0px 1px 4px #ECECEC;
    -moz-box-shadow: inset 0px 1px 4px #ECECEC;
    -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
}
.basic-grey textarea{
    padding: 5px 3px 3px 5px;
}
.basic-grey select {
    background: #FFF url('down-arrow.png') no-repeat right;
    background: #FFF url('down-arrow.png') no-repeat right);
    appearance:none;
    -webkit-appearance:none;
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width: 70%;
    height: 35px;
    line-height: 25px;
}
.basic-grey textarea{
    height:100px;
}
.basic-grey .button {
    background: #E27575;
    border: none;
    padding: 10px 25px 10px 25px;
    color: #FFF;
    box-shadow: 1px 1px 5px #B6B6B6;
    border-radius: 3px;
    text-shadow: 1px 1px 1px #9E3F3F;
    cursor: pointer;
}
.basic-grey .button:hover {
    background: #CF7A7A
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
      <div class="basic-grey"> 
        @foreach($res as $v)
          {!! form_row($form->exam_id, $options = ['attr' => ['class' => 'col-md-4',], 'selected' => $v->exam_id]) !!}
          <div class="clear"></div> 
          {!! form_row($form->board_id, $options = ['attr' => ['class' => 'col-md-4',], 'selected' => $v->board_id]) !!}
          <div class="clear"></div>
          {!! form_row($form->subject_id, $options = ['attr' => ['class' => 'col-md-4',], 'selected' => $v->subject_id]) !!}
          <div class="clear"></div>
          {!! form_row($form->specialization, $options = ['attr' => ['class' => 'col-md-4',], 'value' => $v->specialization]) !!}
          <div class="clear"></div>
          {!! form_row($form->pass_year, $options = ['attr' => ['class' => 'col-md-4',], 'value' => $v->pass_year]) !!}
          <div class="clear"></div>
          {!! form_row($form->percentage, $options = ['attr' => ['class' => 'col-md-4',], 'value' => $v->percentage]) !!}
          <div class="clear"></div>
        @endforeach
      </div>
    </div>
</div>
{!! form_end($form) !!}
</div>
@stop