<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

                @if (Auth::check())

                    <li><a href="{{ route('lerova.dashboard.index') }}">Dashboard</a>

                    @if(config('lerova.modules.blog'))
                    <li><a href="{{ route('lerova.blog.index') }}">Blog</a>
                    @endif


                    @if(config('lerova.modules.about'))
                    <li><a href="{{ route('lerova.about.edit') }}">About Me</a>
                    @endif

                    @if(config('lerova.modules.members'))
                        <li><a href="{{ route('lerova.members.index') }}">Members</a>
                    @endif


                    @if(config('lerova.modules.gallery'))
                        <li><a href="{{ route('lerova.gallery.index') }}">Gallery</a>
                    @endif


                    <li><a href="{{ route('lerova.settings.index') }}">Settings</a></li>

                @endif


            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                    @guest
                    <li><a href="{{ route('login') }}">Anmelden</a></li>

                    @else

                    @if(config('lerova.modules.notifications'))
                    <li><a href="{{ route('lerova.notifications.index') }}"> <i class="fa fa-bell" aria-hidden="true"></i>

                            @if($count_notifications > 0)
                                <span class="label label-success"> {{ $count_notifications }}</span>
                            @endif


                        </a>
                    </li>
                    @endif

                    <li class="inset hidden-sm hidden-xs">
                        <img src="{{Auth::user()->getAvatar()}}">
                    </li>


                    <li><a href="{{ route('lerova.profile.index', Auth()->user()) }}">{{ Auth::user()->name }}</a></li>


                    @role('administrator')
                    <li><a href="{{ route('lerova.administrator.index') }}"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
                    @endrole

                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
            </ul>
        </div>
    </div>
</nav>