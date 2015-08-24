<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link href="{{ asset('plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini fixed">
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <header class="main-header">
          @include('employer.layouts.public_header_menu')
      </header>
      <div class="content-wrapper" style="margin-left:0px !important;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('content-header', '')
          </h1>
          <ol class="breadcrumb">
            @yield('breadcrumb', '')
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          @if ($errors->any())
          <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="icon fa fa-info"></i>
              <ul>
                  {!! implode('', $errors->all('<li>:message</li>')) !!}
              </ul>
            </div>
          @endif
          @if (Session::has('message') || Session::has('alert-info'))
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-info"></i>
                {{ Session::get('message')}} {{ Session::get('alert-info')}}
            </div>
          @endif

          @if (Session::has('alert-warning'))
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-warning"></i>{{ Session::get('alert-warning')}}
            </div>
          @endif

          @if (Session::has('alert-success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-check"></i>{{ Session::get('alert-success')}}
            </div>
          @endif

          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <!-- <strong> Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. -->
      </footer>

    </div><!-- ./wrapper -->

    <script src="{{ asset('assets/js/admin.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    @yield('page_specific_js')
    <script type="text/javascript">
    $(document).ready(function(){

        @yield('page_specific_scripts')

        var active = '{{ Request::segment(1) }}';
        var subactive = '{{ Request::segment(2) }}';
        var subactive3 = '{{ Request::segment(3) }}';
        if(active == "master") {
           	$('#master').addClass('active');
            $('#'+subactive).addClass('active');
            $('#'+subactive+'_'+subactive3).addClass('active');
            if(subactive3=='')
              $('#'+subactive+'_index').addClass('active');
           	//$('#'+subactive).addClass('current open');
           	//$('#'+subactive).closest('ul.sub-menu').css('display', 'block');
        } else if(active == "something"){

        	$('#'+active).addClass('active');
        } else {
            $('ul#sidebar').find('#'+active).parent().parent().addClass('active');
            $('ul#sidebar').find('#'+active).parent().addClass('active');
            $('ul#sidebar').find('#'+active).addClass('active');
        }

      });
    </script>
  </body>
</html>
