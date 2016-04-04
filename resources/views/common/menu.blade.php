<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">

        <img class="img-circle"
            src="{{asset("assets/dist/img/speaker.png")}}">

      </div>
      <div class="pull-left info">
        <p>Teleamp</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>

      <li class="{{ Request::is('dashboard') ? "active" : "" }}">
        <a href="/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="{{ Request::is('amp_install') ? "active" : "" }}">
        <a href="/amp_install">
          <i class="fa fa-cog"></i> <span>Installation</span>
        </a>
      </li>

      <li class="{{ Request::is('amp_database') ? "active" : "" }}">
        <a href="/amp_database">
          <i class="fa fa-database"></i> <span>System Data</span>
        </a>
      </li>

      <li class="{{ Request::is('amp_graphical') ? "active" : "" }}">
        <a href="/amp_graphical">
          <i class="fa fa-area-chart"></i> <span>Monitoring</span>
        </a>
      </li>

      <li class="{{ Request::is('amp_map_plan') ? "active" : "" }}">
        <a href="amp_map_plan">
          <i class="fa fa-map-marker"></i> <span>Maps</span>
        </a>
      </li>


    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
