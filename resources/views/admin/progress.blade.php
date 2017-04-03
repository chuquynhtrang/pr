@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tiến độ làm đồ án</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>Sinh viên</th>
                                <th>Đề tài</th>
                                <th>Tiến độ</th>
                                <th>Ngày cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userProjects as $userProject)
                                <tr>
                                    <td>{{ $userProject->user->name }}</td>
                                    <td>{{ $userProject->project->name }}</td>
                                    <td>
                                        @foreach($userProject->user->getDiaries($userProject->user_id) as $diary)
                                            <p class="progress-bar active" role="progressbar"
                                                aria-valuenow="{{ $diary->progress }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $diary->progress }}%;">
                                                {{ $diary->progress }}%
                                            </p>
                                            <hr>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($userProject->user->getDiaries($userProject->user_id) as $diary)
                                            <p>{{ $diary->updated_at }}</p>
                                        @endforeach
                                    </td>
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