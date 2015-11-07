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
        <div class="col-md-5">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="" src="{!! URL::to($employer->photo) !!}" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">{{ $employer->organization_name }}</h3>
              <h5 class="widget-user-desc"> {{ $employer->organization_type }} / {{ $employer->organization_sector}}</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Total no of Jobs Posted <span class="pull-right badge bg-blue">{{$total_jobs}}</span></a></li>
                <li><a href="#">Jobs Not Verified yet<span class="pull-right badge bg-red">{{count($jobs_not_verified)}}</span></a></li>
                <li><a href="#">Jobs Filled up <span class="pull-right badge bg-green">{{count($jobs_filled_up)}}</span></a></li>
                <li><a href="#">Jobs Available now<span class="pull-right badge bg-aqua">{{count($jobs_available)}}</span></a></li>
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
      <h3 class="box-title"> Contact Person details </h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    
      <strong><i class="fa fa-user margin-r-5"></i> Name </strong>
      &nbsp;&nbsp;&nbsp;
      <span> 
      {{$employer->contact_name}}  ({{ $employer->contact_designation}})
      </span>
      <hr>
      <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
      &nbsp;&nbsp;&nbsp;
      <span> 
      {{$employer->contact_mobile_no}}  
      </span>
      <hr>
      <strong><i class="fa fa-envelope margin-r-5"></i>  E-mail</strong>
      &nbsp;&nbsp;&nbsp;
      <span> 
      {{$employer->contact_email}}  
      </span>
      <hr>
      <strong><i class="fa fa-file-text-o margin-r-5"></i> Additional Note</strong>
      <p>{{ $employer->additional_info }}</p>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->
<div class="col-md-12">
<div class="nav-tabs-custom">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#not_verified" data-toggle="tab"> Jobs needs verification</a></li>
    <li><a href="#jobs_available" data-toggle="tab">Jobs available now</a></li>
    <li><a href="#jobs_filled_up" data-toggle="tab">Jobs fillied up</a></li>
  </ul>
<div class="tab-content no-padding">
<div class="active tab-pane" id="edu">
@if(count($jobs_not_verified)!=0)
  <table class="table table-condensed">
    <tr>
      <th>Job ID</th><th>Position</th>
      <th> No. of post.</th> <th>Industry</th> <th>Type</th>
      <th> Qualification</th><th> Salary Offered</th>
    </tr>
    @foreach($jobs_not_verified as $item)
      <tr>
        <td> {{ $item->emp_job_id }}</td>
        <td> {{ $item->post_name }} </td>
        <td> {{ $item->no_of_post }} </td>
        <td> {{ $item->industry->name }} </td>
        <td> {{ $item->job_type }} </td>
        <td> {{ $item->exam->name }} </td>
        
        <td> {{ Basehelper::moneyFormatIndia($item->salary_offered_min) }} -
        {{ Basehelper::moneyFormatIndia($item->salary_offered_max) }}
        </td>
      </tr>
    @endforeach
    </table>
  @else
  <p class="text-center"> No records available</p>
  @endif
  </div><!-- /.tab-pane -->
  <div class="tab-pane" id="jobs_available">
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
    <p class="text-center"> No records available</p>
  @endif
  </div><!-- /.tab-pane -->
  <div class="tab-pane" id="jobs_filled_up">
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
    <p class="text-center"> No records available</p>
  @endif
  </div><!-- /.tab-pane -->

      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
@stop
