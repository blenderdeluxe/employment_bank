<!-- Sidebar user panel -->

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
      <li><a href="{{URL::route('employer.list_job')}}"><i class="fa fa-list"></i> List of Job posted</a></li>
    </ul>
  </li>
</ul>
