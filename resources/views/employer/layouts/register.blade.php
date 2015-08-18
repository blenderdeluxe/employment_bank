
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> {!! Basehelper::getAppName()!!} | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('font-awesome/4.4.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="{{ asset('admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="{{URL::route('home')}}"> {!! Basehelper::getAppName()!!} </a>
      </div>

      <div class="register-box-body">
        @if (Session::has('message'))
          <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-ban"></i>
              {!! Session::get('message')!!}
          </div>
        @endif

        <p class="login-box-msg">Register a new membership</p>
        {!! Form::open(['route' => 'admin.register']) !!}
          <div class="form-group has-feedback">
            {!! Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Full name', 'required', 'autocomplete'=>'off']) !!}
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email', 'required', 'autocomplete'=>'off']) !!}
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::text('mobile_no', '', ['class' => 'form-control', 'placeholder' => 'Mobile no', 'required', 'autocomplete'=>'off', 'maxlength'=>'10']) !!}
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required', 'autocomplete'=>'off']) !!}
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Retype password', 'required', 'autocomplete'=>'off']) !!}
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  {!! Form::checkbox('aggree', '1', false) !!}
                  I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
          {!! Form::close() !!}

        <a href="{{URL::route('admin.login')}}" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! implode('', $errors->all('<li>:message</li>')) !!}
        </div>
      @endif
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/app.min.js')}}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
