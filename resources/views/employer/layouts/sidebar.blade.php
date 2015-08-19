<!-- Sidebar user panel -->
<div class="user-panel">
  <div class="pull-left image">
    <img src="admin/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
  </div>
  <div class="pull-left info">
    <p>Alexander Pierce</p>
    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
  </div>
</div>
<!-- sidebar menu: : style can be found in sidebar.less -->
<ul id="sidebar" class="sidebar-menu">
  <li class="header">EMPLOYER MODULE</li>
  <!-- <li><a href="{{ URL::route('master.industrytypes.index')}}"><i class="fa fa-book"></i> <span>Industry Types</span></a></li> -->

  <li class="treeview">
    <a href="#">
      <i class="fa fa-share"></i> <span>Job Management</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{URL::route('employer.create_job')}}"><i class="fa fa-plus"></i> Post a Job</a></li>
      <li>
        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
          <li>
            <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>
</ul>
