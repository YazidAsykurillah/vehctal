<!-- navbar -->
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ config('app.url') }}">{{ config('app.name') }}</a>

            </div>
            <div id="navbar" class="navbar-collapse collapse nav-top">
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li>
                            <a href="{{ url('home') }}" class="btn btn-default navbar-btn"> <i class="fa fa-user"></i> My Account</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="btn btn-default navbar-btn"><i class="fa fa-plus-circle"></i> Register</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="btn btn-default navbar-btn" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('myprofile') }}" class="">My Profile</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                
                            </ul>
                        </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>