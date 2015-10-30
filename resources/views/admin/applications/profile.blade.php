@extends('admin.layouts.default')

@section('content-header')
  Verification Status <small> {{$candidate->verified_status}}</small>
@stop

@section('page_specific_header')
<style>
#edu th{
  font-size: 13px;
}
</style>
@stop

@section('content')
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{!!asset($info->image())!!}" alt="User profile picture">
        <h3 class="profile-username text-center">
        {{$info->fullname}}
        </h3>
        <p class="text-muted text-center"> Index Card No: <br>{{$info->index_card_no}} </p>
          <!-- <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
              <b>Jobs Applied</b> <a class="pull-right">1,322</a>
            </li>
          </ul> -->
      <a href="#" class="btn btn-primary btn-block"><b> <i class="fa fa-check-square-o"></i> Approve Now</b></a>
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
            <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>
                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted">{{ $info->district->name }}, {{ $info->district->state->name}}</p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Languages known</strong>
                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>

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
    <li><a href="#settings" data-toggle="tab">Settings</a></li>
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
      <th> Subject/ Trade </th> <th>Specialization</th> <th>Year of Passing</th>
      <th style="width: 40px">% of marks</th>
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

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
@stop
