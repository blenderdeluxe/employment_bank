@extends('admin.layouts.default')

@section('page_specific_header')
<style> .emp_link{ font-weight: 600;} .emp_link:hover{ color:#2F749C;} .label{font-size: 90%; font-weight: 400;}</style>
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
      <th> Qualification </th><th> Salary Offered</th> <th>Status</th>
    </tr>
    @foreach($results as $item)
      <tr>
        <td>
         <a href="{!! route('admin.job_view', Hashids::encode($item->id))!!}"># {{ $item->emp_job_id }} 
         </a>
        </td>
        <td> {{ $item->post_name }} </td>
        <td> {{ $item->no_of_post }} </td>
        <td> {{ $item->industry->name }} </td>
        <td> {{ $item->job_type }} </td>
        <td> {{ $item->exam->name }} </td>
        <td> {{ Basehelper::moneyFormatIndia($item->salary_offered_min) }} -
        {{ Basehelper::moneyFormatIndia($item->salary_offered_max) }}
        </td>
        <td> {!! $item->job_status !!} </td>
      </tr>
    @endforeach
    </table>
    {!! $results->render() !!}
  @else
  <p class="text-center" style="padding:10px;"> No records available</p>
  @endif
        </div>
      </div>
  	</div>
    </div>
</div>
@endsection
