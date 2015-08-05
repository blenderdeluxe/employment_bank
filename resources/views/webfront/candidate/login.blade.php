@extends('webfront.layouts.default')

@section('content-header')

@stop

@section('main_page_container')
  <h4 class="register-title">Register</h4>
  <div class="row">
    <div class="col-md-5">
      <div class="form-regist-container">
          {!! Form::open(['route' => 'webfront.register', 'role'=>'form']) !!}
          <div class="form-group">
            {!! Form::text('name', '', ['maxlength' => '55', 'class' => 'form-control input-form', 'placeholder' => 'Name', 'required', 'autocomplete'=>'off']) !!}
            <div class="register-aksen"></div>
          </div>
          <div class="form-group">
            {!! Form::email('email', '', ['maxlength' => '55', 'class' => 'form-control input-form', 'placeholder' => 'Email', 'required', 'autocomplete'=>'off']) !!}
            <div class="register-aksen"></div>
          </div>
          <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control input-form', 'placeholder' => 'Password', 'required', 'autocomplete'=>'off']) !!}
            <div class="register-aksen"></div>
            {!! Form::submit('REGISTER', ['class' => 'btn btn-default btn-green']) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>

    <div class="col-md-7 register">
      <h5>Already A Member? Log in Here.</h5>
      <a class="btn btn-default btn-green" href="{{URL::route('webfront.login')}}">LOG IN</a>
      <div class="row">
        <div class="col-md-6">
          <ul class="style-list-2">
            <li>On the other hand, we denounce with </li>
            <li>Dislike men who are so beguiled and</li>
            <li>Charms of pleasure of the moment</li>
            <li>Duty through weakness of will, which is</li>
          </ul>
        </div>
        <div class="col-md-6">
          <ul class="style-list-2">
            <li>On the other hand, we denounce with </li>
            <li>Dislike men who are so beguiled and</li>
            <li>Charms of pleasure of the moment</li>
            <li>Duty through weakness of will, which is</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@stop
