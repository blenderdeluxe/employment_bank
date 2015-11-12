@extends('employer.layouts.default')
@section('page_header_custom')

@stop
@section('content-header')
  Posted Jobs
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> List of Job Posted by You, Sorted By Recently posted</h3>
        <br/>
        <br/>
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
      <div class="table-responsive">
    	@if($results->count())
    		<table class="table table-condensed">
          <thead>
              <tr>
                  <th width="5%">Job Id</th>
                  <th width="15%">Post Name</th>
                  <th width="6%">No. of Post</th>
                  <th width="6%">Industry/Sector</th>
                  <th width="5%">Age limit</th>
                  <th width="10%">Salary Offered</th>
                  <th width="5%">Status</th>
                  <th width="4%">Actions</th>
              </tr>
          </thead>
        <tbody>
        
        		@foreach($results as $result)
		        <tr>
					    <td>
              <a class="pull-left" style="margin-right:5px;" href="{!! route('employer.view_job', Hashids::encode($result->id))!!}">
              # {{ $result->emp_job_id }}
              </a>
              </td>
					    <td>{{ $result->post_name }}</td>
              <td>{{ $result->no_of_post }}</td>
              <td>{{ $result->industry->name }}</td>
              <td>{{ $result->preferred_age_min }} - {{ $result->preferred_age_max }}</td>
							<td>
              {{ Basehelper::moneyFormatIndia($result->salary_offered_min) }} -
              {{ Basehelper::moneyFormatIndia($result->salary_offered_max) }}
              </td>
							<td>{{ $result->status ? 'Active' : 'Deactivated' }}</td>
							<td>
                <a href="{!!URL::route('employer.edit_job', $result->id)!!}" class="btn btn-info btn-xs pull-left aug-margin">
                    <i class="fa fa-edit"></i>
                </a>
                {!! Form::open(['method'=>'DELETE', 'route'=>['employer.delete_job', Hashids::encode($result->id)]]) !!}
                  <button type="submit" class="btn btn-danger btn-xs pull-left show_confirm">
                      <i class="fa fa-trash"></i>
                  </button>
                {!! Form::close() !!}
							</td>
						</tr>
          @endforeach
	      </tbody>
      </table>
      {!! $results->render() !!}
      @else
    		<p style="text-align: center;"> No records found.</p>
    	@endif
        </div></div>
      	</div>
    </div>
</div>
@endsection
