@extends('admin.layouts.default')

@section('page_specific_header')
<style> .emp_link{ font-weight: 600;}
.emp_link:hover{ color:#2F749C;}
</style>
@stop

@section('content-header')
  List of Jobs <small> all</small>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> List of all jobs</h3>
      </div><!-- /.box-header -->
      <div class="box-body no-padding">
      <div class="table-responsive">
      @if(count($results)!=0)
      <table class="table table-condensed">
    <tr>
      <th>Job ID</th><th>Position</th>
      <th> No. of post.</th> <th>Industry</th> <th>Type</th>
      <th> Qualification </th><th> Salary Offered</th>
    </tr>
    @foreach($results as $item)
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
        </div>
      </div>
  	</div>
    </div>
</div>
@endsection
