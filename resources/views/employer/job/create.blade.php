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
  Post a New Job<small> </small>
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
<script type="text/javascript">
    function getDistrictList(stateElement, districtElement){
        var url = '{{ URL::route('district.by.state') }}';
        var state = $(stateElement).val();
        $district = $(districtElement);
        districtElement = typeof districtElement !== 'undefined' ? districtElement : '';

        if(state!=''){
            $.ajax({ url: url, type: 'POST', data: { state_id: state } }).done(function( msg ) {
                $district.empty();
                $("<option>").val('').text('--Choose--').appendTo($district);
                $.each(msg, function(key, value) {
                    $("<option>").val(value.id).text(value.name).appendTo($district);
                });
                return true;
            });
        }else
            $district.empty();
    }
</script>
@stop

@section('page_specific_scripts')
    $('#place_of_employment_state_id').change(function(e){ getDistrictList(this, $('#place_of_employment_district_id')); });
@stop
