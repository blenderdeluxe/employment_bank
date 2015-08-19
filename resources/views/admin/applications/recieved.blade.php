@extends('admin.layouts.default')

@section('content-header')
  Applications <small> Not Verified</small>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> List of Application that has not been Verified Yet</h3>
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
                  <th width="10%">Address</th>
                  <th width="12%">Actions</th>
              </tr>
          </thead>
        <tbody>
        <?php $count = 1; ?>
        		@foreach($results as $result)
		        <tr>
					    <td>{{ $count }}</td>
					    <td>{{ $result->f_name }}</td>
              <td>{{ $result->index_card_no }}</td>
              <td>{{ $result->sex }}</td>
							<td>{{ $result->address }}</td>
							<td>
                <a href="{!!URL::route('master.boards.edit', $result->id)!!}" class="btn btn-info btn-xs pull-left aug-margin">
                    <i class="fa fa-edit"></i>
                </a>
                {!! Form::open(array('method'=>'DELETE', 'route'=>array('master.boards.destroy', $result->id))) !!}
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
      @else
    		<p style="text-align: center;"> No records found.</p>
    	@endif
        </div>
      	</div>
    </div>
</div>
@endsection
