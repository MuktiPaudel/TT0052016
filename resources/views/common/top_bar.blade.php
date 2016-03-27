<header class="main-header">

  <!-- Logo -->
  <a href="/dashboard" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b></b>TA</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Tele</b>Amp</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">

                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 5 new groups joined
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 1 new data update
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-red"></i> You changed your username
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img class="user-image" alt="User Image"
                src="{{asset("assets/dist/img/avatar5.png")}}">
            <span class="hidden-xs">Ville</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <p>
                Ville- System Designer
              </p>
            </li>
            <!-- Menu Body -->
                    <li class="user-body">
                      <div class="row">

                        <div class="col-xs-4 text-center sty">
                         <button type="submit" class="btn btn-warning">
                           <i class="fa fa-lg fa-gears (alias)"></i>
                         </button>
                        </div>

                        <div class="col-xs-4 text-center">
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-lg fa-user"></i>
                          </button>
                        </div>

      				  <div class="col-xs-4 text-center">
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-lg fa-power-off"></i>
                          </button>
                          <!--
                          <button type="submit" class="btn btn-primary">
                            <i class="fa fa-lg fa-user"></i>Profile
                          </button>
                        -->
                        </div>

                      </div>
                      <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->

          </ul>
        </li>

      </ul>
    </div>

  </nav>
</header>
