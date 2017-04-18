<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <ul class="nav navbar-top-links navbar-right">
        @if (Auth::check())
            <li style="margin-right: 50px; color: #fff;">
                Xin chào, {{ Auth::user()->name }}
            </li>
            <li class="dropdown" id="link_profile">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="{{ isset(Auth::user()->avatar) ? Auth::user()->avatar : config('common.image_default') }}" id="profile_avatar"><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        @if (Auth::user()->isAdmin())
                            <a href="{{ url('admin/profile', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                        @elseif (Auth::user()->isTeacher())
                            <a href="{{ url('teacher/profile', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                        @else
                            <a href="{{ url('user/profile', Auth::user()->id) }}"><i class="fa fa-user fa-fw"></i> Thông tin cá nhân</a>
                        @endif
                    </li>
                    <li>
                         @if (Auth::user()->isAdmin())
                            <a href="{{ url('admin/change-password', Auth::user()->id) }}"><i class="fa fa-cog fa-fw"></i> Đổi mật khẩu</a>
                        @elseif (Auth::user()->isTeacher())
                            <a href="{{ url('teacher/change-password', Auth::user()->id) }}"><i class="fa fa-cog fa-fw"></i> Đổi mật khẩu</a>
                        @else
                            <a href="{{ url('user/change-password', Auth::user()->id) }}"><i class="fa fa-cog fa-fw"></i> Đổi mật khẩu</a>
                        @endif
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Đăng xuất
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        @endif
        <!-- /.dropdown -->
    </ul>
</div>