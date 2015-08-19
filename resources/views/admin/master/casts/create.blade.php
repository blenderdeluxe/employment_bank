@extends('admin.layouts.default')

@section('content-header')
  Caste <small> Master</small>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">New Caste</h3>
      </div>

        {!! form_start($form) !!}
        <div class="box-body">
          <div class="form-group">
			         {!! form_rest($form) !!}
			    </div>
		    </div>
        {!! form_end($form) !!}

	</div>
</div>
</div>
@stop
