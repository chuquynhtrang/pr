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
        <h4><b>Giảng viên hướng dẫn:</b> {{ $project->user->name }}</h4>
        <hr>
        <p><b>Miêu tả:</b>{{ $project->description }}</p>
        <p><b>Trạng thái:</b></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{url('/user/projects/register/'. $project->id)}}">
                {{csrf_field()}}
                <button type="submit" class="btn btn-success btn-md" {{($check || (isset($userProject->status) && $userProject->status == 2) ? "disabled" : '')}}>
                    <i class="fa fa-edit fa-fw"></i>&nbsp;Đăng kí
                </button>
            </form>
        </div>
    </div>
    <hr>
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
                                <th>ID</th>
                                <th>Sinh viên</th>
                                <th>Ngày đăng kí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userProject as $up)
                                <tr>
                                    <td>{{ $up->user->id }}</td>
                                    <td>{{ $up->user->name }}</td>
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
</div>
@endsection