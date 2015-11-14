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
  Upload a New document<small> </small>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">

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

@section('page_specific_js')

@stop

@section('page_specific_scripts')
     
@stop
