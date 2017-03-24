@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sinh viên đã nhận</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @foreach($projects as $project)
        <h3>Đề tài: {{$project->name}}</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" class="datatables">
                            <thead>
                                <tr>
                                    <th>Mã sinh viên</th>
                                    <th>Tên</th>
                                    <th>Khóa học</th>
                                    <th>Lớp học</th>
                                    <th>Điểm trung bình</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userProjects as $up)
                                    @if($up->project_id == $project->id)
                                    <tr>
                                        <td>{{ $up->user->user_code }}</td>
                                        <td><a href="{{url('teacher/users/'.$up->user->id)}}">{{ $up->user->name }}</a></td>
                                        <td>{{ $up->user->course }}</td>
                                        <td>{{ $up->user->class }}</td>
                                        <td>{{ $up->user->score }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    @endforeach
</div>
@endsection