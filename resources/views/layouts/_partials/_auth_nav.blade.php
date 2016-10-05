<!--header start-->
<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">

        <a href="{{ route('dashboard.index') }}" class="logo">
            Stal de vogelzang
        </a>

        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->
</header>
<!--header end-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rosters.index') }}">
                        <i class="fa fa-list"></i>
                        <span>Lessen</span>
                    </a>
                </li>

                @if (auth()->user()->isAdmin())
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-users"></i>
                            <span>Gebruikers</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('riders.index') }}">
                        <i class="fa fa-user"></i>
                        <span>Ruiters</span>
                    </a>
                </li>
                @if (auth()->user()->isAdmin())
                    <li>
                        <a href="{{ route('messages.index') }}">
                            <i class="fa fa-envelope-o"></i>
                            <span>Berichten</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.index') }}">
                            <i class="fa fa-pencil"></i>
                            <span>Nieuws</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('announcements.index') }}">
                            <i class="fa fa-bullhorn"></i>
                            <span>Aankondigingen</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('setting.index') }}">
                        <i class="fa fa-cog"></i>
                        <span>Mijn gegevens</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fa fa-key"></i>
                        <span>Uitloggen</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
