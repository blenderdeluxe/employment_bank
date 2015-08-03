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
<ul class="sidebar-menu">
  <li class="header">MASTER MODULE</li>
  <!-- <li><a href="{{ URL::route('master.industrytypes.index')}}"><i class="fa fa-book"></i> <span>Industry Types</span></a></li> -->

  <li class="treeview">
    <a href="#">
      <i class="fa fa-share"></i> <span>Master</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li>
        <a href="#"><i class="fa fa-circle-o"></i> Industry Types <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ URL::route('master.industrytypes.index')}}"><i class="fa fa-circle-o"></i> List </a></li>
          <li><a href="{{ URL::route('master.industrytypes.create')}}"><i class="fa fa-circle-o"></i> Add New </a></li>
        </ul>
      </li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-share"></i> <span>Multilevel</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
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
