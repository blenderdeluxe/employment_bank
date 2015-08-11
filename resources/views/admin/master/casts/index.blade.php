@extends('admin.layouts.default')

@section('content-header')
  Casts <small> Master</small>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> List of Cast entries</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
    	@if($results->count())
    		<table class="table table-bordered">
          <thead>
              <tr>
                  <th width="2%">#</th>
                  <th width="50%">Name</th>
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
					    <td>{{ $result->name }}</td>
							<td>
                <a href="{!!URL::route('master.casts.edit', $result->id)!!}" class="btn btn-info btn-xs pull-left aug-margin">
                    <i class="fa fa-edit"></i>
                </a>
                {!! Form::open(array('method'=>'DELETE', 'route'=>array('master.casts.destroy', $result->id))) !!}
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
