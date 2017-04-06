@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý điểm bảo vệ</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading table-panel">
                    Danh sách điểm bảo vệ
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>Mã sinh viên</th>
                                <th>Tên sinh viên</th>
                                <th>Tên đồ án</th>
                                <th>Điểm</th>
                                <th>Thêm/Sửa điểm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($points as $point)
                                <tr>
                                    <td>{{ $point->user->user_code }}</td>
                                    <td>{{ $point->user->name }}</td>
                                    <td>{{ $point->project->name }}</td>
                                    <td>
                                        @if(isset($point->point))
                                            <button type="button" class="btn btn-default btn-sm">{{ $point->point }}</button>
                                        @else
                                            Chưa có số liệu
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/points/edit/' . $point->id) }}" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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