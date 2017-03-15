<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <ul class="nav navbar-top-links navbar-right">
        @if (Auth::check())
            <li style="margin-right: 50px; color: #fff;">
                Xin chào, {{ Auth::user()->name }}
            </li>
            <li class="dropdown" id="link_profile">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="{{Auth::user()->avatar}}" id="profile_avatar"><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        @if (Auth::user()->isAdmin())
                            <a href="{{ url('admin/profile', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        @elseif (Auth::user()->isTeacher())
                            <a href="{{ url('teacher/profile', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        @else
                            <a href="{{ url('user/profile', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        @endif
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        @else
        <li style="margin-right: 50px; color: #fff;">
            <a class="nav-href" href="{{ url('/login') }}">ĐĂNG NHẬP</a>
        </li>
        <li style="margin-right: 50px; color: #fff;">
            <a class="nav-href" href="{{ url('/register') }}">ĐĂNG KÍ</a>
        </li>
        @endif
        <!-- /.dropdown -->
    </ul>
</div>