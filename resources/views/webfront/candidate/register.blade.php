@extends('webfront.layouts.default')

@section('content-header')

@stop

@section('main_page_container')
  <h4 class="register-title">Register</h4>
  <div class="row">
    <div class="col-md-7">
      <div class="form-regist-container">
          {!! Form::open(['route' => 'candidate.store', 'role'=>'form']) !!}

          <div class="form-group col-md-12">
            {!! Form::text('username', '', ['maxlength' => '55', 'class' => 'form-control input-form', 'placeholder' => 'username', 'required', 'autocomplete'=>'off']) !!}
            <div class="register-aksen"></div>
          </div>
          <div class="form-group col-md-6">
            {!! Form::text('mobile_no', '', ['maxlength' => '10', 'class' => 'form-control input-form', 'placeholder' => 'Mobile No', 'required', 'autocomplete'=>'off']) !!}
            <div class="register-aksen"></div>
          </div>
          <div class="form-group col-md-6">
            {!! Form::email('email', '', ['maxlength' => '55', 'class' => 'form-control input-form', 'placeholder' => 'Email', 'required', 'autocomplete'=>'off']) !!}
            <div class="register-aksen"></div>
          </div>
          <div class="form-group col-md-6">
            {!! Form::password('password', ['class' => 'form-control input-form', 'placeholder' => 'Password', 'required', 'autocomplete'=>'off']) !!}
            <div class="register-aksen"></div>
          </div>
          <div class="form-group col-md-6">
            {!! Form::password('password_confirmation', ['class' => 'form-control input-form', 'placeholder' => 'Confirm Password', 'required', 'autocomplete'=>'off']) !!}
            <div class="register-aksen"></div>
          </div>
          {!! Form::submit('REGISTER', ['class' => 'btn btn-default btn-green']) !!}
        {!! Form::close() !!}
      </div>
    </div>

    <div class="col-md-5 register">
      <h5>Already A Member? Log in Here.</h5>
      <a class="btn btn-default btn-green" href="{{URL::route('candidate.login')}}">LOG IN</a>
      <div class="row">
        <div class="col-md-12">
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
