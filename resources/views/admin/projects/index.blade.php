@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đề tài</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading table-panel">
                    Danh sách đề tài
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên đề tài</th>
                                <th>Giảng viên</th>
                                <th>Hướng thực hiện</th>
                                <th>Tài liệu tham khảo</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->user->name }}</td>
                                    <td class="text-description">{{ $project->description }}</td>
                                    <td>
                                        <a href="http://localhost/pr/public/uploads/references/{{$project->references}}" target="_blank">{{ $project->references }}</a>
                                    </td>
                                    <td>{{ $project->created_at }}</td>
                                    <td>{{ $project->updated_at }}</td>
                                </tr>
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
</div>
@endsection