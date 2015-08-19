<div class="top"><!-- top start-->
  <div class="container">
    <div class="media-top-right">
      <ul class="media-top clearfix">
        <!-- <li class="item"><a href="#" target="blank"><i class="fa fa-twitter"></i></a></li> -->
        <!-- <li class="item"><a href="#" target="blank"><i class="fa fa-facebook"></i></a></li>
        <li class="item"><a href="#" target="blank"><i class="fa fa-rss"></i></a></li>
        <li class="item"><a href="#" target="blank"><i class="fa fa-google-plus"></i></a></li> -->
      </ul>
      <ul class="media-top-2 clearfix">
<<<<<<< HEAD
<<<<<<< HEAD
        <li><a href="{{URL::route('candidate.logout')}}" class="btn btn-default btn-blue btn-sm">LOGOUT</a></li>
        <li><a href="{{URL::route('candidate.register')}}" class="btn btn-default btn-blue btn-sm">REGISTER</a></li>
        <li><a href="{{URL::route('candidate.login')}}" class="btn btn-default btn-green btn-sm" >LOG IN</a></li>
=======
=======
>>>>>>> master
        @if (Auth::candidate()->guest())
            <li><a href="{{URL::route('candidate.register')}}" class="btn btn-default btn-blue btn-sm">REGISTER</a></li>
            <li><a href="{{URL::route('candidate.login')}}" class="btn btn-default btn-green btn-sm" >LOG IN</a></li>
        @else
            <li><a href="#" class="btn btn-default btn-blue btn-sm">
                <span>Logged in as &nbsp;</span>{{ Auth::candidate()->get()->username }}</a>
            </li>
            <li><a href="{{URL::route('candidate.logout')}}" class="btn btn-default btn-blue btn-sm">
                Log Out
              </a>
            </li>

            </li>
        @endif

<<<<<<< HEAD
>>>>>>> employer-job-posting
=======
>>>>>>> master
      </ul>
      <div class="clearfix"></div>
    </div>
  </div>
</div><!-- top end-->
