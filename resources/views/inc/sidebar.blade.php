<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"></li>
      <li class="active treeview">
        <a>
          <i class="fa fa-dashboard"></i> <span>Werknemers</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('werknemers.index') }}"><i class="fa"></i>Overzicht</a></li>
          <li><a href="{{ route('werknemers.create')}}"><i class="fa"></i>Werknemer toevoegen</a></li>
          <li><a href="{{ route('werknemers.beschikbaar')}}"><i class="fa"></i>Beschikbaar</a></li>
          <!-- <li><a href="{{ route('huisartsen.index') }}"><i class="fa"></i>Huisartsen</a></li> -->

        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
