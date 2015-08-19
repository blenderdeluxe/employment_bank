<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('font-awesome/4.4.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('ionicons/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <!-- <link href="{{ asset('admin/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" /> -->
    <link href="{{ asset('admin/css/skins/skin-blue.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet" type="text/css" />

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

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js')}}" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/app.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('plugins/chartjs/Chart.min.js')}}" type="text/javascript"></script>
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
