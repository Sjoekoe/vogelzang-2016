<!-- Navbar -->
<header class="header">
    <nav class="navbar navbar-default navbar-static-top active">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">Stal de vogelzang</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navigation-nav">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="{{ Request::is('about') ? 'active' : '' }}">
                        <a href="{{ route('about') }}">Over ons</a>
                    </li>
                    <li class="{{ Request::is('manege') ? 'active' : '' }}">
                        <a href="{{ route('manege') }}">Manege</a>
                    </li>
                    <li class="{{ Request::is('accommodatie') ? 'active' : '' }}">
                        <a href="{{ route('accommodatie') }}">Stallingen</a>
                    </li>
                    <li class="{{ Request::is('nieuws') ? 'active' : '' }}">
                        <a href="{{ route('articles.index') }}">Nieuws</a>
                    </li>
                    <li class="{{ Request::is('faq') ? 'active' : '' }}">
                        <a href="{{ route('faq') }}">Faq</a>
                    </li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                    @if (auth()->check())
                        <li>
                            <a href="{{ route('dashboard.index') }}">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
</header>
<!-- End Navbar -->
