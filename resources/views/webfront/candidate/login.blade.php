@extends('webfront.layouts.default')

@section('content-header')

@stop

@section('main_page_container')
  <h4 class="login-title">Log In</h4>
  <div class="row">
  
    <div class="col-md-5">
      <div class="form-singin-container">
          {!! Form::open(['route' => 'candidate.login', 'role'=>'form']) !!}
          <div class="form-group">
            {!! Form::text('username', '', ['maxlength' => '55', 'class' => 'form-control input-form', 'placeholder' => 'username', 'required', 'autocomplete'=>'off']) !!}
            <div class="singin-aksen"></div>
          </div>
          <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control input-form', 'placeholder' => 'Password', 'required', 'autocomplete'=>'off']) !!}
            <div class="singin-aksen"></div>
            {!! Form::submit('LOGIN', ['class' => 'btn btn-default btn-green']) !!}
            <a class="btn btn-info" href="{{URL::route('candidate.activate.otp')}}"> <i class="fa fa-link"></i> Activate Via OTP</a>
          </div>
        {!! Form::close() !!}
      </div>
    </div>

    <div class="col-md-7 singin-page">
						<h5>Not A Member? Register Now</h5>
      <a class="btn btn-default btn-blue" href="{{URL::route('candidate.register')}}">REGISTER</a>
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
