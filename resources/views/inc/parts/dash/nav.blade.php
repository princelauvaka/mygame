    
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? "active" : "" }}"><a href="{{ url('/') }}">Home</a></li>
                    <li class="{{ Request::is('about') ? "active" : "" }}"><a href="{{ url('/about') }}">About</a></li>
                    <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ url('/contact') }}">Contact</a></li>
                    <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="{{ url('/blog') }}">Blog</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/posts') }}"><i class="fa fa-btn fa-sign-out"></i>Posts</a></li>
                                <li><a href="{{ route('categories.index') }}"><i class="fa fa-btn fa-sign-out"></i>Categories</a></li>
                                <li><a href="{{ route('tags.index') }}"><i class="fa fa-btn fa-sign-out"></i>Tags</a></li>
                                <li><a href="{{ url('/posts/create') }}"><i class="fa fa-btn fa-sign-out"></i>Create Posts</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>