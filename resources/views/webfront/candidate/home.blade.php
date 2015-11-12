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

/* .info-box
=================================================================== */
.info-box {
  min-height: 140px;
  margin-bottom: 30px;
  padding: 20px;
  color: white;
  -webkit-box-shadow: inset 0 0 1px 1px rgba(255, 255, 255, 0.35), 0 3px 1px -1px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: inset 0 0 1px 1px rgba(255, 255, 255, 0.35), 0 3px 1px -1px rgba(0, 0, 0, 0.1);
  box-shadow: inset 0 0 1px 1px rgba(255, 255, 255, 0.35), 0 3px 1px -1px rgba(0, 0, 0, 0.1);
}
.info-box i {
  display: block;
  height: 100px;
  font-size: 60px;
  line-height: 100px;
  width: 100px;
  float: left;
  text-align: center;
  margin-right: 20px;
  padding-right: 20px;
  color: rgba(255, 255, 255, 0.75);
}
.info-box .count {
  margin-top: 20px;
  font-size: 18px;
  font-weight: 700;
}
.info-box .title {
  font-size: 12px;
  text-transform: uppercase;
  font-weight: 600;
}
.info-box .desc {
  margin-top: 10px;
  font-size: 12px;
}
.info-box.danger {
  background: #ff5454;
  border: 1px solid #ff2121;
}
.info-box.warning {
  background: #fabb3d;
  border: 1px solid #f9aa0b;
}
.info-box.primary {
  background: #20a8d8;
  border: 1px solid #1985ac;
}
.info-box.info {
  background: #67c2ef;
  border: 1px solid #39afea;
}
.info-box.success {
  background: #79c447;
  border: 1px solid #61a434;
}
/*----------------  color------------------------*/
.dark-heading-bg {
  background: #4c4f53;
  border: 1px solid #4c4f53;
}
.main-bg {
  background: #e6e8ea;
}
.white-bg {
  color : #768399;
  background : #fff;
  background-color : #fff;
}
.red-bg {
  color : #fff;
  background : #d95043;
  background-color : #d95043;
}
.blue-bg {
  color : #fff;
  background : #57889c;
  background-color : #57889c;
}
.green-bg {
  color : #fff;
  background : #26c281;
  background-color : #26c281;
}
.greenLight-bg {
  color: #71843f;
  background: #71843f;
  background-color: #71843f;
}
.yellow-bg {
  color : #fff;
  background : #fc6;
  background-color : #fc6;
}
.orange-bg {
  color : #fff;
  background : #f4b162;
  background-color : #f4b162;
}
.purple-bg {
  color : #fff;
  background : #af91e1;
  background-color : #af91e1;
}
.pink-bg {
  color : #fff;
  background : #f78db8;
  background-color : #f78db8;
}
.lime-bg {
  color : #fff;
  background : #a8db43;
  background-color : #a8db43;
}
.magenta-bg {
  color : #fff;
  background : #e65097;
  background-color : #e65097;
}
.teal-bg {
  color : #fff;
  background : #97d3c5;
  background-color : #97d3c5;
}
.brown-bg {
  color : #fff;
  background : #d1b993;
  background-color : #d1b993;
}
.gray-bg {
  color : #768399;
  background : #e4e9eb;
  background-color : #e4e9eb;
}
.dark-bg {
  color : #fff;
  background : #1a2732;
  background-color : #1a2732;
}
.facebook-bg {
  color: #fff;
  background: #3b5998;
  background-color : #3b5998;
}
.twitter-bg {
  color: #fff;
  background: #00aced;
  background-color : #00aced; 
}
.linkedin-bg {
  color: #fff;
  background: #4875b4;
  background-color : #4875b4;  
}
.text-right {
  text-align: right;
}
.aug_legend{
  transition: background-color 0.5s ease;
}
.aug_legend:hover{ 
  background-color: #119138;
  color: #fff;
}

</style>
@stop

@section('content-header')

@stop

@section('main_page_container')
  <div class="post-resume-page-title">Candidate Home</div>
@stop
<!--
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
-->

@section('content')
<div class="container" style="padding:20px 0">


    <div class="row">
        <div class="col-md-12 text-right">
          <a class="aug_legend rigt" href="{{URL::route('candidate.get.i_card')}}" target="_blank">
             Views/Print Identity Card <i class="fa fa-external-link"></i>
          </a>&nbsp;
        </div>
    </div>

    <div class="row">
      
      

      <a href="{{URL::route('candidate.create.resume')}}" target="_blank">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box blue-bg">
            <i class="fa fa-user"></i>
            <div class="count">Bio/Personal Information</div>
                      
          </div><!--/.info-box-->     
        </div><!--/.col-->
      </a>
      
      <a href="{{URL::route('candidate.create.edu_details')}}" target="_blank">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box facebook-bg">
            <i class="fa fa-book"></i>
            <div class="count">Education Details</div>
                       
          </div><!--/.info-box-->     
        </div><!--/.col-->  
      </a>
      
      <a href="{{URL::route('candidate.create.language_details')}}" target="_blank">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box dark-bg">
            <i class="fa fa-comments-o"></i>
            <div class="count">Languages Known</div>
                       
          </div><!--/.info-box-->     
        </div><!--/.col-->
      </a>
      
      <a href="{{URL::route('candidate.create.exp_details')}}" target="_blank">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <div class="info-box linkedin-bg">
            <i class="fa fa-cubes"></i>
            <div class="count">Experience</div>
                       
          </div><!--/.info-box-->     
        </div><!--/.col-->
      </a>

      <!--
      <strong>Profile Completion</strong>
      <div class="col-md-12">
        <div class="progress">
          <div class="progress-bar" style="width: 60%;">
              60%
          </div>
        </div>  
      </div> 
      -->
      
    </div><!--/.row-->
    

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
