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
  <li class="header">MASTER MODULE</li>
  <!-- <li><a href="{{ URL::route('master.industrytypes.index')}}"><i class="fa fa-book"></i> <span>Industry Types</span></a></li> -->

  <li class="treeview" id="master">
    <a href="#">
      <i class="fa fa-share"></i> <span>Master</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li id="industrytypes">
        <a href="#"><i class="fa fa-circle-o"></i> Industry Types <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="industrytypes_index"><a href="{{ URL::route('master.industrytypes.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="industrytypes_create"><a href="{{ URL::route('master.industrytypes.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>
      <li id="departmenttypes">
        <a href="#"><i class="fa fa-circle-o"></i> Department Types <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="departmenttypes_index"><a href="{{ URL::route('master.departmenttypes.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="departmenttypes_create"><a href="{{ URL::route('master.departmenttypes.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>

      <li id="exams">
        <a href="#"><i class="fa fa-circle-o"></i> Exams <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="exams_index"><a href="{{ URL::route('master.exams.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="exams_create"><a href="{{ URL::route('master.exams.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>
      <li id="boards">
        <a href="#"><i class="fa fa-circle-o"></i> University/Boards <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="boards_index"><a href="{{ URL::route('master.boards.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="boards_create"><a href="{{ URL::route('master.boards.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>

      <li id="subjects">
        <a href="#"><i class="fa fa-circle-o"></i> Subjects <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="subjects_index"><a href="{{ URL::route('master.subjects.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="subjects_create"><a href="{{ URL::route('master.subjects.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>

      <li id="languages">
        <a href="#"><i class="fa fa-circle-o"></i> Languages <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="languages_index"><a href="{{ URL::route('master.languages.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="languages_create"><a href="{{ URL::route('master.languages.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>
      <li id="casts">
        <a href="#"><i class="fa fa-circle-o"></i> Casts <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="casts_index"><a href="{{ URL::route('master.casts.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="casts_create"><a href="{{ URL::route('master.casts.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>

      <li id="proof_details">
        <a href="#"><i class="fa fa-circle-o"></i> Proof of Residense <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="proof_details_index"><a href="{{ URL::route('master.proof_details.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="proof_details_create"><a href="{{ URL::route('master.proof_details.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>

      <li id="states">
        <a href="#"><i class="fa fa-circle-o"></i> States <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="states_index"><a href="{{ URL::route('master.states.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="states_create"><a href="{{ URL::route('master.states.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>
      <li id="districts">
        <a href="#"><i class="fa fa-circle-o"></i> Districts <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li id="districts_index"><a href="{{ URL::route('master.districts.index')}}"><i class="fa fa-list-ul"></i> List </a></li>
          <li id="districts_create"><a href="{{ URL::route('master.districts.create')}}"><i class="fa fa-plus"></i> Add New </a></li>
        </ul>
      </li>

    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-share"></i> <span>Candidates</span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{URL::route('admin.applications_recieved')}}"><i class="fa fa-list"></i> Applications Recieved</a></li>
    </ul>
  </li>
</ul>
