<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('user.get.profile') }}">Welcome, {{ Auth::user()->first_name." ".Auth::user()->last_name }}. 
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-user">
                        </i>
                         Edit Profile
                    </a>
                </li>
                          
                <li class="divider">
                </li>
                <li>
                    <form method='post' action="{{ route('app.logout') }}">
                        {{ csrf_field() }}
                        <button type="submit">
                            <i class="fa fa-power-off">
                            </i>
                             Log Out
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-collapse -->
</nav>