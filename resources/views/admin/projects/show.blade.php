@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đồ án: {{ $project->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
        <h4><b>Giảng viên hướng dẫn:</b>&nbsp;{{ $project->user->name }}</h4>
        <p><b>Hướng thực hiện:</b>&nbsp;{{ $project->description }}</p>
        <p>
            <b>Trạng thái:</b>
            @if(count($userWait))
                <span class="label label-danger">Chờ phê duyệt</span>
            @elseif(count($userReceive))
                <span class="label label-success">Đã đăng kí</span>
            @else
                <span class="label label-primary">Chưa đăng kí</span>
            @endif
        </p>
        <p>
            <b>Tài liệu tham khảo:</b>&nbsp;
            @if($project->references)
                <a href="http://localhost/pr/public/uploads/references/{{$project->references}}" target="_blank">{{ $project->references }}</a>
            @else
                <span>Chưa cập nhật</span>
            @endif
        </p>
        </div>
    </div>
    @if(count($userWait))
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading table-panel">
                        Danh sách sinh viên chờ phê duyệt
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                                <tr>
                                    <th>Mã sinh viên</th>
                                    <th>Sinh viên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Khóa học</th>
                                    <th>Lớp học</th>
                                    <th>Ngày đăng kí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userWait as $up)
                                    <tr>
                                        <td>{{ $up->user->id }}</td>
                                        <td>{{ $up->user->name }}</td>
                                        <td>
                                            <a href="#"><img src="{{ isset($up->user->avatar) ? $up->user->avatar : config('common.image_default') }}"  class="user_avatar"></a>
                                        </td>
                                        <td>{{ $up->user->course }}</td>
                                        <td>{{ $up->user->class }}</td>
                                        <td>{{ $up->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    @elseif(count($userReceive))
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading table-panel">
                        Sinh viên được chọn
                    </div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Mã sinh viên</th>
                                    <th>Sinh viên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Khóa học</th>
                                    <th>Lớp học</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userReceive as $up)
                                    <tr>
                                        <td>{{ $up->user->id }}</td>
                                        <td>{{ $up->user->name }}</td>
                                        <td>
                                            <a href="#"><img src="{{ isset($up->user->avatar) ? $up->user->avatar : config('common.image_default') }}"  class="user_avatar"></a>
                                        </td>
                                        <td>{{ $up->user->course }}</td>
                                        <td>{{ $up->user->class }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection