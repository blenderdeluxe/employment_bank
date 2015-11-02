@extends('admin.layouts.default')

@section('content-header')
  Applications <small> Verified</small>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> List of Application that has been Approved/Verified</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
    	@if($results->count())
    		<table class="table table-bordered">
          <thead>
              <tr>
                  <th width="2%">#</th>
                  <th width="10%">FullName</th>
                  <th width="5%">Index Card No</th>
                  <th width="5%">Gender</th>
                  <th width="5%">Date of Birth</th>
                  <!-- <th width="10%">Address</th> -->
                  <th width="6%">Actions</th>
              </tr>
          </thead>
        <tbody>
        <?php $count = 1; ?>
        		@foreach($results as $result)
		        <tr>
					    <td>{{ $count }}</td>
					    <td>{{ $result->fullname }}</td>
              <td>{{ $result->index_card_no }}</td>
              <td>{{ $result->sex }}</td>
              <td>{{ $result->dob }}</td>
							<!-- <td>{{ $result->address }}</td> -->
							<td>
                <a href="{!!route('admin.view.i_card', [$result->id])!!}" class="btn btn-info btn-xs pull-left aug-margin">
                    <i class="fa fa-search"></i>
                </a>
                <a href="{!!route('admin.view.profile', [Hashids::encode($result->id)])!!}" class="btn btn-info btn-xs pull-left aug-margin">
                    <i class="fa fa-folder-open"></i> View Profile
                </a>
							</td>
						</tr>
					<?php $count++; ?>
          @endforeach
	      </tbody>
      </table>
      @else
    		<p style="text-align: center;"> No records found.</p>
    	@endif
        </div>
      	</div>
    </div>
</div>
@endsection
