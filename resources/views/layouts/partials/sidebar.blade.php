<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            @if (Auth::user()->isAdmin())
                <li>
                    <a href="{{ url('/admin') }}"><i class="fa fa-area-chart fa-fw"></i>&nbsp;&nbsp;Thống kê</a>
                </li>
                <li>
                    <a href="{{ url('/admin/news/create') }}"><i class="fa fa-newspaper-o fa-fw"></i>&nbsp;&nbsp;Đăng tin tức</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user-circle fa-fw"></i>&nbsp;&nbsp;Quản lý người dùng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('admin/users/0') }}">Sinh viên</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/users/2') }}">Giảng viên</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/users/1') }}">Admin</a>
                        </li>
                        <li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{ url('admin/projects') }}"><i class="fa fa-book fa-fw"></i>&nbsp;&nbsp;Xem danh sách đồ án</a>
                </li>
                <li>
                    <a href="{{ url('admin/forms') }}"><i class="fa fa-file-text-o fa-fw"></i>&nbsp;&nbsp;Quản lý biểu mẫu</a>
                </li>
                <li>
                    <a href="{{ url('admin/progress') }}"><i class="fa fa-tasks fa-fw"></i>&nbsp;&nbsp;Kiểm tra tiến độ</a>
                </li>
                <li>
                    <a href="{{ url('/admin/councils') }}"><i class="fa fa-address-card fa-fw"></i>&nbsp;&nbsp;Quản lý hội đồng bảo vệ</a>
                </li>
                <li>
                    <a href="{{ url('/admin/points') }}"><i class="fa fa-edit fa-fw"></i>&nbsp;&nbsp;Cập nhật điểm bảo vệ</a>
                </li>
            @elseif (Auth::user()->isTeacher())
                <li>
                    <a href="{{ url('teacher/news') }}"><i class="fa fa-newspaper-o fa-fw"></i>&nbsp;&nbsp;Tin tức</a>
                </li>
                <li>
                    <a href="{{ url('teacher/projects') }}"><i class="fa fa-book fa-fw"></i>&nbsp;&nbsp;Quản lý đề tài</a>
                </li>
                <li>
                    <a href="{{url('teacher/users/wait') }}"><i class="fa fa-users fa-fw"></i>&nbsp;&nbsp;Sinh viên chờ phê duyệt</a>
                </li>
                <li>
                    <a href="{{url('teacher/users/receive') }}"><i class="fa fa-users fa-fw"></i>&nbsp;&nbsp;Sinh viên đã nhận</a>
                </li>
                </li>
                <li>
                    <a href="{{url('teacher/progress')}}"><i class="fa fa-tasks fa-fw"></i>&nbsp;&nbsp;Kiểm tra tiến độ</a>
                </li>
                <li>
                    <a href="{{ url('user/forms') }}"><i class="fa fa-file-pdf-o fa-fw"></i>&nbsp;&nbsp;Biểu mẫu tham khảo</a>
                </li>
            @else
                <li>
                    <a href="{{ url('user/news') }}"><i class="fa fa-newspaper-o fa-fw"></i>&nbsp;&nbsp;Tin tức</a>
                </li>
                <li>
                    <a href="{{ url('user/projects') }}"><i class="fa fa-edit fa-fw"></i>&nbsp;&nbsp;Đăng kí đề tài</a>
                </li>
                <li>
                    <a href="{{ url('user/progress') }}"><i class="fa fa-flag fa-fw"></i>&nbsp;&nbsp;Cập nhật tiến độ</a>
                </li>
                <li>
                    <a href="{{ url('user/forms') }}"><i class="fa fa-file-pdf-o fa-fw"></i>&nbsp;&nbsp;Biểu mẫu tham khảo</a>
                </li>
                <li>
                    <a href="{{ url('user/councils') }}"><i class="fa fa-address-card fa-fw"></i>&nbsp;&nbsp;Hội đồng bảo vệ</a>
                </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->