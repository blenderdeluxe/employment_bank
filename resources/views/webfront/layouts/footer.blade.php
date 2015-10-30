<div class="container"><!-- Container -->
  <div class="row">
    <div class="col-md-3 footer-widget"><!-- Text Widget -->
      <h6 class="widget-title">Saepe eveniet ut et voluptates</h6>
      <div class="textwidget">
        <p>At vero eos et accusamitate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
      </div>
    </div><!-- Text Widget -->

    <div class="col-md-2 footer-widget"><!-- Footer Menu Widget -->
      <h6 class="widget-title">Useful Links</h6>
      <div class="footer-widget-nav">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="{{URL::route('employer.create_job')}}">Post A Job</a></li>
          <li><a href="#">Post A Resume</a></li>
        </ul>
      </div>
    </div><!-- Footer Menu Widget -->

    <div class="col-md-4 footer-widget"><!-- Recent Tweet Widget -->
      <h6 class="widget-title">Recent Tweets</h6>
      <div class="recent-twitt">
        <p>
          Just posted, a <a href="#">http://t.co/</a>
        </p>
        <div class="hastag"># 04:29 AM Oct 31</div>
        <p>
          Some message or news here
        </p>
        <div class="hastag"># 04:29 AM Oct 31</div>
      </div>
    </div><!-- Recent Tweet Widget -->

    <div class="col-md-3 footer-widget"><!-- News Leter Widget -->
      <h6 class="widget-title">Singn For news Letter</h6>
      <div class="textwidget">
        <p> ducimus</p>
      </div>

      <form role="form">
        <div class="form-group">
          <input type="email" class="input-newstler">
        </div>
        <button type="button" class="btn-newstler">Sign Up</button>
      </form>
      <a href="{{ route('admin.login')}}" target="blank">ADMIN Login<i class="media-footer footer-fb"></i></a>
      <a href="#" target="blank"><i class="media-footer footer-blog"></i></a>
      <a href="#" target="blank"><i class="media-footer footer-rss"></i></a>
    </div><!-- News Leter Widget -->
    <div class="clearfix"></div>
  </div>

  <div class="footer-credits"><!-- Footer credits -->
    2015 &copy; Zantrik Technologies All Rights Reserved.
  </div><!-- Footer credits -->

</div><!-- Container -->
