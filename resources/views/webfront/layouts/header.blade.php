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
              <li><a href="about.html">About Page</a></li>
              <li><a href="homepage-joblisting.html">Job Listing</a></li>
            </ul>
          </li>
          <li><a  href="#">JOB SEARCH</a></li>
          <li><a  href="post-job.html">POST A JOB</a></li>
          <li><a  href="post-resume.html">POST A RESUME</a></li>
        </ul>
      </nav>
    </div><!-- Main Navigation -->
    <div class="clearfix"></div>
  </div>
</div><!-- container -->
