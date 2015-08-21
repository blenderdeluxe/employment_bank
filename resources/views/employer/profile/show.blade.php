@extends('employer.layouts.default')

@section('content-header')
  Employer   <small> Profile view</small>
@endsection

@section('page_specifi_style')
.placeholder_uploadimages i{
  font-size: 27px;
  display: block;
  margin-bottom: 10px;
  color: #85d27a;
}
.placeholder_uploadimages:hover i {
    color: #fff;
}
.placeholder_uploadimages {
    display: inline-block;
    height: 65px;
    width: 100px;
    border: 1px dashed #85D27A;
    margin: 5px 10px;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    vertical-align: top;
    overflow: hidden;
    font-size: 10px;
}
.placeholder_uploadimages:hover {
    background-color: #85d27a;
    color: #fff;
}
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
<div id="collapseDetail" class="panel-collapse collapse in" style="height: auto;">
	    	<div class="panel-body">
	    		<form class="form-horizontal margintop40 has-validation-callback" id="companyForm" method="post" action="http://www.truelancer.com/ajax/save_company">
	<input type="hidden" id="tl_company_id" name="company[id]" value="">
	<div class="form-group">
		<label class="col-sm-3 control-label">Image</label>
	   	<div class="col-sm-2">
	    	<img id="logo" src="{!! asset('uploads/'.$result->photo)!!}" onerror="$(this).attr('src','{!! asset('uploads/employers/default.jpg')!!}')" width="129px" height="131px" alt="Picture">
		</div>
		<div class="col-sm-4">
			<div style="margin-top:10px;">
				<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#imageModal">Add Logo</button>
			</div>
		</div>
	</div>
	<div class="form-group">
	    <label class="col-sm-3 control-label">Company Name</label>
	    <div class="col-sm-6">
	    	<input type="text" class="form-control" name="company[name]" value="" placeholder="" data-validation="required" data-validation-error-msg="Please enter your company name">
		</div>
	</div>
		<div class="form-group">
	    <label class="col-sm-3 control-label">Tagline</label>
	    <div class="col-sm-6">
	    	<input type="text" class="form-control" name="company[tagline]" value="" placeholder="" data-validation="required" data-validation-error-msg="Please enter your company tagline">
		</div>
	</div>
	<div class="form-group">
	    <label class="col-sm-3 control-label">Website</label>
	   	<div class="col-sm-6">
			<div class="input-group">
				<span class="input-group-addon">http://</span>
				<input type="text" class="form-control" name="company[website]" value="" placeholder="company website" aria-describedby="basic-addon1" data-validation="required" data-validation-error-msg="Please enter your company website">
			</div>
		</div>
	</div>
	<div class="form-group">
	    <label class="col-sm-3 control-label">Description</label>
	    <div class="col-sm-6">
	    	<textarea style="min-height: 200px;" class="form-control" placeholder="write your company description" id="description" name="company[description]" value="" data-validation="length" data-validation-length="50-500" data-validation-error-msg="Please write your company description (Min 50 Chars and Max 500 chars)"></textarea>
	    	<span class="charsleft"><span id="max-length-description">500</span> chars left</span>
	    </div>
	</div>
	<div class="form-group">
	    <label class="col-sm-3 control-label">Country</label>
	    <div class="col-sm-4">
	    	<div class="select2-container form-control" id="s2id_company_country"><a href="javascript:void(0)" onclick="return false;" class="select2-choice select2-default" tabindex="-1">   <span class="select2-chosen">Select Country</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select id="company_country" class="form-control select2-offscreen" name="company[countrycode]" data-validation="required" data-validation-error-msg="Please select your country" tabindex="-1">
		    	<option></option>
		    				    	<option value="AF">Afghanistan</option>

							    	<option value="BR">Brazil</option>

							</select>
	    </div>
	 </div>
	<div class="form-group">
	    <div class="col-sm-4 col-sm-offset-3">
	   		<button id="companydetail" type="submit" class="btn btn-info col-xs-6 ladda-button" data-style="expand-left">Save</button>
	    </div>
	</div>
</form>
	</div>
</div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Change Picture</h4>
            </div>
    <div class="modal-body">
      <div class="step1 collapse in row-fluid">
        <div class="form-group col-md-6" style="border:1px dashed green;cursor: pointer;" onclick="$('#input_photo').click();">
            <i class="glyphicon glyphicon-picture"></i> Click to upload.
      </div>
      <div class="form-group col-md-12">
        <input id="input_photo" style="cursor: pointer; display:none;" name="photo" type="file"/>
      </div>
    </div><br/>
      <img title="Preview" src="" id="uploadPreview" height="130px" width="400px" style="border:1px dashed green; display:none;"/>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </form>
        </div>
        </div>
    </div>
  </div>
    <!-- Modl ends  -->
</div>
@endsection

@section('page_specific_scripts')
$(document).on('change', '#input_photo', function(){
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
            			document.getElementById('uploadPreview').src = oFREvent.target.result;
            			$("#uploadPreview").show();
						}
              			$('#uploadPreview').hide();
					} else {
						$('#uploadPreview').hide();
					}
				}
			});
  @stop
