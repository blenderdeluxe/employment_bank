@section('page_specific_styles')
<style>
.main-logo{
  margin-top:-0.09%;
}
</style>
@stop
<div class="container"><!-- container -->
  <div class="row">
    <div class="col-md-4"><!-- logo -->
      <a href="{{URL::route('home')}}" title="Job Board" rel="home">
        <img class="main-logo" src="{{ asset('webfront/images/logo.png')}}" alt="job board" />
      </a>
    </div><!-- logo -->
    <div class="col-md-8 main-nav"><!-- Main Navigation -->
      <a id="touch-menu" class="mobile-menu" href="#"><i class="fa fa-bars fa-2x"></i></a>
      <nav>
        <ul class="menu">
          <li><a href="{{URL::route('home')}}">HOME</a>
            <ul class="sub-menu">
              <li><a href="#">About Page</a></li>
              <li><a href="{{URL::route('home')}}">Job Listing</a></li>
            </ul>
          </li>
          <li><a  href="#">JOB SEARCH</a></li>
          <li><a  href="{{URL::route('employer.create_job')}}"> POST A JOB</a></li>
          <li><a  href="{{URL::route('candidate.create.resume')}}"> POST A RESUME</a></li>
        </ul>
      </nav>
    </div><!-- Main Navigation -->
    <div class="clearfix"></div>
  </div>
</div><!-- container -->
