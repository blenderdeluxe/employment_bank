@extends('webfront.layouts.default')

@section('page_specific_styles')
<style>
.form-horizontal .form-group {
    margin-right: 0px !important;
}
a.tryitbtn, a.tryitbtn:link, a.tryitbtn:visited, a.showbtn, a.showbtn:link, a.showbtn:visited {
    font-family:Verdana, Geneva, Tahoma, Arial, Helvetica, sans-serif;
    display:inline-block;
    color:#FFFFFF;
    background-color:#8AC007;
    font-size:15px;
    text-align:center;
    padding:5px 16px;
    text-decoration:none;
    margin-left:0;
    margin-top:0px;
    margin-bottom:5px;
    border:1px solid #8AC007;
    white-space:nowrap;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

a.tryitbtn:hover,a.tryitbtn:active,a.showbtn:hover,a.showbtn:active {
    background-color:#4A99CE;
    color:#FFFFFF;
    border:1px solid #3C9FE2;
}
</style>
@stop

@section('content-header')

@stop

@section('main_page_container')
  <div class="post-resume-page-title">Candidate Home</div>
  <div class="post-resume-phone"> Profile Completion
    <div class="progress">
      <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%">
        {{$progress}}%
      </div>
    </div>
    <div>
        Identity Card Status : {{$i_card_status}}
    </div>
  </div>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="form-group aug_legend"><i class="fa fa-pencil-square-o"></i> Fill Your Personal Details </div>
            <p>
              <a class="tryitbtn" href="{{URL::route('candidate.create.resume')}}" target="_blank">
                1. Add Bio/Personal Information »
              </a>&nbsp;
              <a class="tryitbtn" href="{{URL::route('candidate.create.edu_details')}}" target="_blank">
                2. Add Education Details »
              </a>&nbsp;
              <a class="tryitbtn" href="{{URL::route('candidate.create.language_details')}}" target="_blank">
                3. Add Languages Known »
              </a>
              <a class="tryitbtn" href="{{URL::route('candidate.create.exp_details')}}" target="_blank">
                4. Add Experience Details »
              </a>&nbsp;
            </p>
        </div>

        <div class="col-md-12">
          <div class="form-group aug_legend"><i class="fa fa-copy"></i> Get Your Temporary Identity Card </div>
            <p>
              <a class="tryitbtn" href="{{URL::route('candidate.get.i_card')}}" target="_blank">
                 Views/Print Identity Card <i class="fa fa-external-link"></i>
              </a>&nbsp;
            </p>
        </div>


    </div>

</div>
@stop

@section('page_content')
<!-- <div class="content-about">
  <div id="cs">
    <div class="container">
    <div class="spacer-1">&nbsp;</div>
      <h1>Hey Friends Any Quries?</h1>
      <p>
        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt.
      </p>
      <h1 class="phone-cs">Call: 1 800 000 500</h1>
    </div>
  </div>
</div> -->
@stop

@section('page_specific_js')
<script type="text/javascript">


</script>
@stop
@section('page_specific_scripts')

@stop
