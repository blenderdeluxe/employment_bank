@extends('admin.layouts.default')

@section('content-header')
  Verification Status <small> {{$candidate->verified_status}}</small>
@stop

@section('page_specific_header')
<style> #edu th{ font-size: 13px; background-color: #DDDDDD;}
#exp th{ font-size: 13px; background-color: #DDDDDD;}
.box-body hr { margin-top: 5px; margin-bottom: 5px;}
</style>
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive" src="{!! asset($info->image()) !!}" alt="User profile picture">
        <h3 class="profile-username text-center" style="font-size: 16px;">
        {{$info->fullname}}
        </h3>
        <p class="text-muted text-center"> Index Card No: <br>{{$info->index_card_no}} </p>
          <!-- <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Jobs Applied</b> <a class="pull-right">1,322</a>
            </li>
          </ul> -->
      @if($candidate->verified_status == 'Not Verified')
      <a title="This will mark the profile as Verified or Approved so that he can apply to any jobs that has been posted" href="{!! URL::route('admin.verify.profile', Hashids::encode($info->id)) !!}" class="btn btn-primary btn-block">
        <b> <i class="fa fa-check-square-o"></i> Approve Now </b>
      </a>      
      @elseif($candidate->verified_status == 'Verified')
      <a title="This will mark the profile as suspended or halted so that he can not apply to any job posted"
       href="{!! URL::route('admin.suspend.profile', Hashids::encode($info->id)) !!}" class="btn btn-warning btn-block">
        <b> <i class="fa fa-stop"></i> set as Halted/Suspended </b>
      </a>
      @elseif($candidate->verified_status == 'Halted')
      <a title="This will mark the profile as Verified or Approved so that he can apply to any jobs that has been posted" href="{!! URL::route('admin.verify.profile', Hashids::encode($info->id)) !!}" class="btn btn-success btn-block">
        <b> <i class="fa fa-check"></i> Re-Approve </b>
      </a>
      @endif
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!-- /.col -->
<div class="col-md-4">
<!-- About Me Box -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">About Me</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <strong><i class="fa fa-phone margin-r-5"></i>  Phone</strong>
      <p class="text-muted"> {{$candidate->mobile_no}} </p>
      <hr>
      <strong><i class="fa fa-envelope margin-r-5"></i>  E-mail</strong>
      <p class="text-muted"> {{$candidate->email}} </p>
      <hr>
      <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
      <p class="text-muted">
        {{ $info->address}}<br/>
        {{ $info->district->name }}, {{ $info->district->state->name}}
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
      <p>{{ $info->additional_info }}</p>
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
  <div class="active tab-pane" id="bio">
    <table class="table table-striped">
      <tr>
        <th scope="row" style="width: 200px"> Full Name</th>
        <td> {{ $info->fullname}} </td>
      </tr>
      <tr>
        <th scope="row"> Guardian Name</th>
        <td> {{ $info->guar_name}} </td>
      </tr>
      <tr>
        <th scope="row"> Spouse Name</th>
        <td> {{ $info->spouse_name}} </td>
      </tr>
      <tr>
        <th scope="row"> Sex</th>
        <td> {{ $info->sex}} </td>
      </tr>
      <tr>
        <th scope="row"> Date of Birth</th>
        <td> {{ $info->dob}} </td>
      </tr>
      <tr>
        <th scope="row"> Religion</th>
        <td> {{ $info->religion}} </td>
      </tr>
      <tr>
        <th scope="row"> Marital Status</th>
        <td> {{ $info->marital_status}} </td>
      </tr>
    </table>
  </div><!-- /.tab-pane -->

<div class="tab-pane" id="edu">
    <table class="table table-condensed">
    <tr>
      <th>Exam Passed</th><th>University/Board/Council</th>
      <th> Subject/ Trade </th> <th>Specialization</th> <th>Year</th>
      <th style="width: 80px">% of marks</th>
    </tr>
    @foreach($edu as $item)
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
  @if(count($exp)!=0)
    <table class="table table-condensed">
    <tr>
      <th>Employer's Name</th><th> Sector </th><th>Post Held</th>
      <th> Exp. Type </th>  <th>Salary</th>
      <th style="width: 130px">Year of experience</th>
    </tr>
    @foreach($exp as $item)
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
