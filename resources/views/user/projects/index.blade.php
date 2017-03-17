@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách đề tài</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <div class="row">
        <div class="col-lg-12">
            @if($check == 1)
                <div class="alert alert-warning">
                    Cảm ơn bạn đã đăng kí. Đề tài đang được giảng viên phê duyệt.
                    <a href="{{url('user/projects/'. $user[0]->project_id)}}">Click để xem</a>
                </div>
            @elseif($check == 2)
                <div class="alert alert-success">
                    Đề tài bạn đăng kí đã được phê duyệt.
                    <a href="{{url('user/projects/'. $user[0]->project_id)}}">Click để xem</a>
                </div>
            @elseif($check == 3)
                <div class="alert alert-danger">
                    Đề tài bạn đăng kí đã bị giảng viên từ chối. Mời bạn đăng kí lại!
                </div>
            @else
                <div class="alert alert-info">
                    Bạn chưa đăng kí đề tài nào!
                </div>
            @endif
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên đề tài</th>
                                <th>Giảng viên</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ isset($project->user) ? $project->user->name :'' }}</td>
                                    <td>
                                        <a href="{{url('/user/projects/'.  $project->id) }}" class="btn btn-success btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Xem</a>
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