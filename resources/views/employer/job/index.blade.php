@extends('employer.layouts.default')
@section('page_header_custom')
<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<style>
body{
    font-family: 'Ubuntu', sans-serif;
}
.form-group-sm{
    margin-top:5px;
}
/*will remove this block when css will be mixed via gulp*/
</style>
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
      </div><!-- /.box-header -->
      <div class="box-body">
    	@if($results->count())
    		<table class="table table-bordered">
          <thead>
              <tr>
                  <th width="2%">#</th>
                  <th width="10%">Post Name</th>
                  <th width="8%">No. of Post</th>
                  <th width="5%">Industry/Sector</th>
                  <th width="8%">Age limit</th>
                  <th width="20%">Description</th>
                  <th width="5%">Status</th>
                  <th width="5%">View</th>
                  <th width="12%">Actions</th>
              </tr>
          </thead>
        <tbody>
        <?php $count = 1; ?>
            @if($results->currentPage() != 1)
                $count = (($results->currentPage() - 1) * $results->perPage()) + 1
            @endif
        		@foreach($results as $result)
		        <tr>
					    <td>{{ $count }}</td>
					    <td>{{ $result->post_name }}</td>
              <td>{{ $result->no_of_post }}</td>
              <td>{{ $result->industry->name }}</td>
              <td>{{ $result->preferred_age_min }} - {{ $result->preferred_age_max }}</td>
							<td>{{ $result->description }}</td>
							<td>{{ $result->status ? 'Active' : 'Deactivated' }}</td>
              <td><a href="{{ route('employer.view_job', $result->id)}}">View</td>
							<td>
                <a href="{!!URL::route('employer.edit_job', $result->id)!!}" class="btn btn-info btn-xs pull-left aug-margin">
                    <i class="fa fa-edit"></i>
                </a>
                {!! Form::open(array('method'=>'DELETE', 'route'=>array('employer.update_job', $result->id))) !!}
                  <button type="submit" class="btn btn-danger btn-xs pull-left show_confirm">
                      <i class="fa fa-trash"></i>
                  </button>
                {!! Form::close() !!}
							</td>
						</tr>
					<?php $count++; ?>
          @endforeach
	      </tbody>
      </table>
      {!! $results->render() !!}
      @else
    		<p style="text-align: center;"> No records found.</p>
    	@endif
        </div>
      	</div>
    </div>
</div>
@endsection
