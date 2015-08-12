@extends('webfront.layouts.default')

@section('content-header')

@stop

@section('main_page_container')
  <div class="post-resume-page-title">Post a Resume</div>
  <div class="post-resume-phone">Call: 1 800 000 500</div>
@stop

@section('content')
<div class="container">
<div class="spacer-1">&nbsp;</div>
{!! form_start($form, $formOptions = ['class'=>'form-horizontal','role'=>'form']) !!}
  <div class="row">

    <div class="col-md-6">
          <div class="form-group form-group-sm">
              <label for="fullname" class="col-sm-2 control-label">Sasdasd</label>
              <!-- TODO all the form element s fileds should be rendered and validated -->
              <div class="col-sm-10">
                  {!! form_widget($form->fullname) !!}
              </div>
          </div>

          <div class="form-group form-group-sm">
              <label for="inputCisty" class="col-sm-2 control-label">Sasdasd</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputCisty" placeholder="Input text">
              </div>
          </div>
      </form>

    </div>

      <div class="col-md-6">

        <form class="form-horizontal" role="form">
            <div class="form-group form-group-sm">
                <label for="inputCity" class="col-sm-2 control-label">Label</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCity" placeholder="Input text">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label for="inputCisty" class="col-sm-2 control-label">Sasdasd</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputCisty" placeholder="Input text">
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-8">

      <form role="form" class="post-resume-form">
        <div class="form-group form-group-sm">
          <label for="name">Your Name</label>
          <input type="text" class="form-control input" id="name" />
        </div>
        <div class="form-group">
          <label for="email">Your Email</label>
          <input type="email" class="form-control input" id="email" />
        </div>
        <div class="form-group">
          <label for="professionalauto">Professional Auto</label>
          <input type="text" class="form-control input" id="professionalauto" />
          <p>Leave this blank if the job can be done from anywhere (i.e. lorem ipsum)</p>
        </div>

        <div class="form-group">
          <label for="jobregion">Location</label>
          <select class="form-control" id="jobregion" >
            <option>Blank 1</option>
            <option>Blank 2</option>
            <option>Blank 3</option>
            <option>Blank 4</option>
            <option>Blank 5</option>
          </select>
        </div>

        <div class="form-group">
          <label for="photo">Photo <span>(Optional)</span> <small>Max. file size: 8 MB.</small></label>
          <div class="upload">
            <input type="file" id="photo">
          </div>
        </div>

        <div class="form-group">
          <label for="resumecategory">Resume Category</label>
          <select class="form-control" id="resumecategory" >
            <option>Blank 1</option>
            <option>Blank 2</option>
            <option>Blank 3</option>
            <option>Blank 4</option>
            <option>Blank 5</option>
          </select>
        </div>

        <div class="form-group">
          <label for="resumecontent">Resume Content</label>
          <textarea class="form-control textarea" id="resumecontent" ></textarea>
        </div>
        <div class="form-group">
          <label for="skill">Skills <span>(Optional)</span></label>
          <input type="text" class="form-control input" id="skill" />
        </div>
        <div class="form-group">
          <label for="addform-url">URL(S) <span>(Optional)</span></label>
          <br/>
          <button class="job-btn btn-black" id="addform-url">+ Add URL</button>
          <div id="post-resume-url">
          </div>
        </div>

        <div class="form-group">
          <label for="addform-education">Education <span>(Optional)</span></label>
          <br/>
          <button class="job-btn btn-black" id="addform-education">+ Add URL</button>
          <div id="post-resume-education">
          </div>
        </div>

        <div class="form-group">
          <label for="addform-exp">Experience <span>(Optional)</span></label>
          <br/>
          <button class="job-btn btn-black" id="addform-exp">+ Add URL</button>
          <div id="post-resume-exp">
          </div>
        </div>

        <div class="form-group">
          <label for="resumefile">Resume Files <span>(Optional)</span> <small> Optionally upload your resume for employers to view.</small></label>
          <div class="upload">
            <input type="file" id="resumefile">
          </div>
        </div>

        <div class="form-group">
          <button class="btn btn-default btn-green">POST A RESUME</button>
        </div>

      </form>
      <div class="spacer-2">&nbsp;</div>
    </div>

    <div class="col-md-4">
      <div class="job-side-wrap">
        <h4>ALREADY HAVE AN ACCOUNT?</h4>
        <p>
          Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search.
        </p>
        <p class="centering"><button class="btn btn-default btn-green">LOG IN</button></p>
      </div>

      <div class="job-side-wrap">
        <h4>Post Your Resume</h4>
        <p>
          At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti molestias
        </p>
        <p class="centering"><button class="btn btn-default btn-black">UPLOAD YOUR RESUME <i class="icon-upload white"></i></button></p>
      </div>

      <div class="job-side-wrap">
        <h4>Post Job Now</h4>
        <p>
          At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti molestias
        </p>
        <p class="centering"><button class="btn btn-default btn-green postnow">POST A JOB NOW</button></p>
      </div>
    </div>
  </div>

</div>
@stop

@section('page_content')
<div class="content-about">
  <div id="cs"><!-- CS -->
    <div class="container">
    <div class="spacer-1">&nbsp;</div>
      <h1>Hey Friends Any Quries?</h1>
      <p>
        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt.
      </p>
      <h1 class="phone-cs">Call: 1 800 000 500</h1>
    </div>
  </div><!-- CS -->
</div><!-- end content -->
@stop
