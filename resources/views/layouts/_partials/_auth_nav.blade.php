<!--header start-->
<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">

        <a href="{{ route('dashboard.index') }}" class="logo">
            Stal de vogelzang
        </a>
    </div>
    <!--logo end-->

    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="username">{{ auth()->user()->username() }}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
            <li>
                <div class="toggle-right-box">
                    <div class="fa fa-bars"></div>
                </div>
            </li>
        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->            <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('riders.index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Ruiters</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('messages.index') }}">
                        <i class="fa fa-envelope-o"></i>
                        <span>Berichten</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
