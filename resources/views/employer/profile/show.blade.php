@extends('employer.layouts.default')

@section('content-header')
  Employer   <small> Profile view</small>
@endsection

@section('page_specifi_style')

@stop

@section('content')
<div class="row">
  <div class="col-md-12">
<div id="collapseDetail" class="panel-collapse collapse in" style="height: auto;">
  	<div class="panel-body">
  {!! Form::open(['id'=>'companyForm', 'route' => 'employer.profile', 'class'=>'form-horizontal', 'files'=>true]) !!}
	<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
		<label class="col-sm-3 control-label">Company Logo/Image</label>
	   	<div class="col-sm-5">
<img id="logo" src="{!! asset($result->photo)!!}"
onerror="$(this).attr('src','{!! asset('uploads/employers/default.jpg')!!}')" style="min-width:129px; max-width:250px; height: 155px;" alt="Picture">
		</div>
		<div class="col-sm-4">
			<div style="margin-top:10px;">
				<button id="add_photo" type="button" class="btn btn-primary">Add Logo</button>
        {!! Form::file('photo', ['id'=>'photo', 'style'=>'display:none']) !!}
			</div>
      {!! $errors->first('photo', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('organization_name') ? 'has-error' : ''}}">
	    <label class="col-sm-3 control-label">Company Name</label>
	    <div class="col-sm-6">
        {!! Form::text('organization_name', $result->organization_name, ['required', 'class' => 'form-control', 'autocomplete'=>'off']) !!}
        {!! $errors->first('organization_name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
		<div class="form-group {{ $errors->has('tagline') ? 'has-error' : ''}}">
	    <label class="col-sm-3 control-label">Tagline</label>
	    <div class="col-sm-6">
        {!! Form::text('tagline', $result->tagline, ['class' => 'form-control', 'autocomplete'=>'off']) !!}
        {!! $errors->first('tagline', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('web_address') ? 'has-error' : ''}}">
	    <label class="col-sm-3 control-label">Website</label>
	   	<div class="col-sm-6">
        {!! Form::text('web_address', $result->web_address, ['class' => 'form-control', 'autocomplete'=>'off']) !!}
      {!! $errors->first('web_address', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
	    <label class="col-sm-3 control-label">Description</label>
	    <div class="col-sm-7">
        {!! Form::textarea('details', $result->details, ['id'=>'details', 'style'=>'min-height: 200px;', 'class' => 'form-control','placeholder'=>'write your company description']) !!}
        {!! $errors->first('details', '<span class="help-block">:message</span>') !!}
	    </div>
	</div>
	<div class="form-group">
	    <div class="col-sm-4 col-sm-offset-3">
	   		<button id="companydetail" type="submit" class="btn btn-info col-xs-6 ladda-button" data-style="expand-left">Save</button>
	    </div>
	</div>
{!! Form::close() !!}
	</div>
</div>
</div>
    <!-- Modl ends  -->
</div>
@endsection
@section('page_specific_js')
  <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
});
</script>
@stop

@section('page_specific_scripts')

$('#add_photo').click(function() {
  $('#photo').trigger('click');
});
$(document).on('change', '#photo', function(){
				var maximum =  512000; // 512 kb
		 		var inputFile = $(this);
	 			var filename=inputFile.val();
	 			var valid_extensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  			var extension=filename.substr((Math.max(0, filename.lastIndexOf(".")) || Infinity) + 1);
  			alert(extension);
  			alert(inputFile[0].files[0].size);
				if(!valid_extensions.test(filename)){
   					alert('Please upload a file in image format of either .jpeg .jpg .gif formats');
   					inputFile.val('');
   					return false;
				} else if (inputFile[0].files[0].size > maximum) {
    				alert("Photo size exceeded 512KB. Please choose a file that is less than or equal to 512KB"); // Do your thing to handle the error.
    				inputFile.val(''); // Clear the field.
					return false;
   			} else {
        			var oFReader = new FileReader();
        			oFReader.readAsDataURL(inputFile[0].files[0]);
					if(extension.toLowerCase()=='jpg' || extension.toLowerCase()=='jpeg' || extension.toLowerCase()=='png' || extension.toLowerCase()=='gif') {
      				oFReader.onload = function (oFREvent) {
            			document.getElementById('logo').src = oFREvent.target.result;
            			$("#logo").show();
						}
              			$('#logo').hide();
					} else {
						$('#logo').hide();
					}
				}
			});
  @stop
