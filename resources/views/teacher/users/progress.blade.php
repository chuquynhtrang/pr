@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kiểm tra tiến độ</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @foreach($diaries as $diary)
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
                                    <th>Duyệt</th>
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
                                        <td>
                                            <form method="POST" action="{{url('teacher/projects/'.$project->id.'/users/'.$up->user->id.'/approve')}}">
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Bạn có chắc chắn không?')"><i class="fa fa-check"></i></button>
                                            </form>
                                        </td>
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