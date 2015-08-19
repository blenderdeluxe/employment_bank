@extends('webfront.layouts.default')

@section('content-header')

@stop

@section('main_page_container')
  <h4 class="login-title">Activate Your Account via OTP</h4>
  <div class="row">
    <div class="col-md-3"> &nbsp;
    </div>
    <div class="col-md-5">
      <div class="form-singin-container">
          {!! Form::open(['route' => 'candidate.activate.otp', 'role'=>'form']) !!}
          <div class="form-group">
            {!! Form::text('username', '', ['maxlength' => '55', 'class' => 'form-control input-form', 'placeholder' => 'username', 'required', 'autocomplete'=>'off']) !!}
            <div class="singin-aksen"></div>
          </div>
          <div class="form-group">
            {!! Form::text('confirmation_code','', ['class' => 'form-control input-form', 'placeholder' => 'OTP', 'required', 'autocomplete'=>'off']) !!}
            <div class="singin-aksen"></div>
            {!! Form::submit('Activate', ['class' => 'btn btn-default btn-blue col-md-12']) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>

  </div>
@stop
