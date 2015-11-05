<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Emplo 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('page_specific_header')
  </head>
  <body class="skin-blue sidebar-mini fixed">
    <div class="wrapper">
      <header class="main-header">
          @include('admin.layouts.header')
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            @include('admin.layouts.sidebar')
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('content-header', 'Dashboard <small>Version 2.0</small>')
          </h1>
          <ol class="breadcrumb">
            @yield('breadcrumb', '<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Dashboard</li>')
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
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

    <script type="text/javascript">
    $(document).ready(function(){

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
