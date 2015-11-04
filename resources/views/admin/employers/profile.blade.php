@extends('admin.layouts.default')

@section('content-header')
  Verification Status <small> | s</small>
@stop

@section('page_specific_header')
<style> #edu th{ font-size: 13px; background-color: #DDDDDD;}
#exp th{ font-size: 13px; background-color: #DDDDDD;}
.box-body hr { margin-top: 5px; margin-bottom: 5px;}
</style>
@stop

@section('content')

 <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="{!! URL::to('public/'.$employer->photo) !!}" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Nadia Carmichael</h3>
              <h5 class="widget-user-desc">Lead Developer</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

<div class="col-md-4">
<!-- About Me Box -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">About Me</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <strong><i class="fa fa-phone margin-r-5"></i>  Phone</strong>
      <p class="text-muted"> {{$employer->mobile_no}} </p>
      <hr>
      <strong><i class="fa fa-envelope margin-r-5"></i>  E-mail</strong>
      <p class="text-muted"> {{$employer->email}} </p>
      <hr>
      <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
      <p class="text-muted">
        {{ $employer->address}}<br/>
        
      </p>
      <!-- <hr>
      <strong><i class="fa fa-pencil margin-r-5"></i> Languages known</strong>
      <p>
        <span class="label label-danger">UI Design</span>
        <span class="label label-success">Coding</span>
        <span class="label label-info">Javascript</span>
        <span class="label label-warning">PHP</span>
        <span class="label label-primary">Node.js</span>
      </p> -->
      <hr>
      <strong><i class="fa fa-file-text-o margin-r-5"></i> Additional Note</strong>
      <p>{{ $employer->additional_info }}</p>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->
<div class="col-md-12">
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#bio" data-toggle="tab"> Profile/Bio</a></li>
    <li><a href="#edu" data-toggle="tab">Education Details</a></li>
    <li><a href="#exp" data-toggle="tab">Experience Details</a></li>
  </ul>
<div class="tab-content">
<div class="active tab-pane" id="edu">
    <table class="table table-condensed">
    <tr>
      <th>Exam Passed</th><th>University/Board/Council</th>
      <th> Subject/ Trade </th> <th>Specialization</th> <th>Year</th>
      <th style="width: 80px">% of marks</th>
    </tr>
    @foreach($jobs_not_verified as $item)
      <tr>
        <td> {{ $item->exam_name }}</td>
        <td> {{ $item->board_name }} </td>
        <td> {{ $item->subject_name }} </td>
        <td> {{ $item->specialization }} </td>
        <td> {{ $item->pass_year }} </td>
        <td> {{ $item->percentage }} </td>
      </tr>
    @endforeach
    </table>
  </div><!-- /.tab-pane -->
  <div class="tab-pane" id="exp">
  @if(count($jobs_available)!=0)
    <table class="table table-condensed">
    <tr>
      <th>Employer's Name</th><th> Sector </th><th>Post Held</th>
      <th> Exp. Type </th>  <th>Salary</th>
      <th style="width: 130px">Year of experience</th>
    </tr>
    @foreach($jobs_available as $item)
      <tr>
        <td> {{ $item->employers_name }}</td>
        <td> {{ $item->sector }} </td>
        <td> {{ $item->post_held }} </td>
        <td> {{ $item->exp_type }} </td>
        <td> {{ $item->salary }} </td>
        <td> {{ $item->year_experience }} </td>
      </tr>
    @endforeach
    </table>
  @else
    No Experience records has been provided
  @endif
  </div><!-- /.tab-pane -->

      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
@stop
