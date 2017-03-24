@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đề tài: {{ $project->name }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
        <h4><b>Giảng viên hướng dẫn:</b>&nbsp;{{ $project->user->name }}</h4>
        <hr>
        <p><b>Hướng thực hiện:</b>&nbsp;{{ $project->description }}</p>
        <p><b>Trạng thái:</b></p>
        <p><b>Tài liệu tham khảo:</b>&nbsp;<a href="http://localhost/pr/public/uploads/references/{{$project->references}}" target="_blank">{{ $project->references }}</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($check == 1 && $checkProject == $project->id)
                <form method="POST" action="{{ url('user/'. Auth::user()->id . '/projects/') }}">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-md" onclick="return confirm('Are you sure delete?')"><i class="fa fa-minus-circle"></i>&nbsp; Hủy đăng kí</button>
                </form>
            @elseif ($check == 0 || ($check == 3 && ($checkProject != $project->id) && (!$userReceive)))
                <form method="POST" action="{{url('/user/projects/register/'. $project->id)}}">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-success btn-md">
                        <i class="fa fa-edit fa-fw"></i>&nbsp;Đăng kí
                    </button>
                </form>
            @endif
        </div>
    </div>
    <hr>
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
                                            <a href="#"><img src="{{ $up->user->avatar }}"  class="user_avatar"></a>
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
                                            <a href="#"><img src="{{ $up->user->avatar }}"  class="user_avatar"></a>
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