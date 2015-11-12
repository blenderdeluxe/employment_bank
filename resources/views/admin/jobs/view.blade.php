@extends('admin.layouts.default')

@section('content-header')
  View Job<small> </small>
@endsection
@section('page_specific_header')
<style>
  .job-field{padding: 6px 0;background: #f6f6f6;margin-bottom: 4px;font-weight: bold;}
  h4 {text-align: center;padding-bottom: 15px 0;text-decoration: underline;}
  .project-add-info{
    font-size: 14px;
  }
  .project-add-info .label{ font-size: 14px;}

</style>
@stop
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
        <div class="box-body job-view">
        <a href="{{ route('admin.job_list_all')}}" class="btn btn-primary btn-sm pull-left"><span class="glyphicon glyphicon-chevron-left"></span> List</a>
        &nbsp;&nbsp;
        <a href="{!! route('admin.employer_view_profile', [Hashids::encode($results->employer->id)])!!}" class="btn btn-primary btn-sm">
          <span class="fa fa-building-o"></span>&nbsp;
           View Employer profile
        </a>
          <h4>Post - {{ $results->post_name }}</h4>
            <div class="row">
              <div class="col-md-6">
                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> No of Posts </div>
                  <div class="col-md-6"> {{ $results->no_of_post }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Job Type </div>
                  <div class="col-md-6"> {{ $results->job_type }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Industry </div>
                  <div class="col-md-6"> {{ $results->industry['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Place of employment state </div>
                  <div class="col-md-6"> {{ $results->state['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Place of employment district </div>
                  <div class="col-md-6"> {{ $results->district['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Place of employment city </div>
                  <div class="col-md-6"> {{ $results->place_of_employment_city }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Min Salary offered </div>
                  <div class="col-md-6"> {{ Basehelper::moneyFormatIndia($results->salary_offered_min) }} /-</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Max Salary offered </div>
                  <div class="col-md-6"> {{ Basehelper::moneyFormatIndia($results->salary_offered_max) }} /-</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Other Benifits </div>
                  <div class="col-md-6"> {{ $results->other_benefits }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Min Age preferred </div>
                  <div class="col-md-6"> {{ $results->preferred_age_min }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Max Age preferred </div>
                  <div class="col-md-6"> {{ $results->preferred_age_max }}</div>
                </div>
              </div>

              <div class="col-md-6">
                

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Preferred Caste </div>
                  <div class="col-md-6"> {{ $results->preferred_caste }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Preferred Sex </div>
                  <div class="col-md-6"> {{ $results->preferred_sex }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Exam Passed </div>
                  <div class="col-md-6"> {{ $results->exam['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Subject </div>
                  <div class="col-md-6"> {{ $results->subject['name'] }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Specialization </div>
                  <div class="col-md-6"> {{ $results->specialization }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Preferred Experience </div>
                  <div class="col-md-6"> {{ $results->preferred_experience }} Year(s)</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Ex-Serviceman </div>
                  <div class="col-md-6"> {{ $results->ex_service }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Physical Height </div>
                  <div class="col-md-6"> {{ $results->physical_height }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Physical Weight </div>
                  <div class="col-md-6"> {{ $results->physical_weight }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Chest </div>
                  <div class="col-md-6"> {{ $results->physical_chest }}</div>
                </div>

                <div class="col-md-12 job-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i> Physically Challenged </div>
                  <div class="col-md-6"> {{ $results->physical_challenge }}</div>
                </div>
              </div>
              @if($results->description != ''):
              <div class="col-md-10 col-md-offset-1">
                {!! $results->description !!}
              </div>
              @endif
            </div>

            <div class="row">
              <div class="col-md-12 project-add-info">
                {!! Form::open(['route' => ['admin.job_update_status', Hashids::encode($results->id)], 'id' => 'updateform', 'class'=>'form-horizontal pull-left']) !!} 
                {!! Form::select('status', ['0'=>'Unpublished', '1'=>'Active', '2'=>'Filled Up'], $results->status, ['class'=>'form-control pull-left']) !!}
                {!! Form::submit('update', ['class'=>'btn btn-success btn-sm pull-left']) !!}
                {!! Form::close() !!}
              </div>
            </div>

            <div class="row" style="margin-top:30px">
              <div class="col-md-12 project-add-info">
                <i class="fa fa-bullseye"></i> Job Status {!! $results->job_status!!} &nbsp;| &nbsp;
                <i class="fa fa-calendar-check-o"></i> Job created at <strong>{{ $results->created_at->format('d-m-Y h:i A') }}</strong> &nbsp;|
                 <i class="fa fa-building"></i> {{ $results->employer->organization_type }} <strong>{{ $results->employer['organization_name'] }} </strong>
              </div>
            </div>

        </div>

	</div>
</div>
</div>
@stop