@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hội đồng chấm đồ án</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading table-panel">
                    Danh sách hội đồng chấm đồ án
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Địa điểm</th>
                                <th>Thời gian bảo vệ</th>
                                <th>Người chấm</th>
                                <th>Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($councils as $council)
                                <tr>
                                    <td>{{ $council->id }}</td>
                                    <td>{{ $council->place }}</td>
                                    <td>{{ $council->time }}</td>
                                    <td>
                                        <p><b>Chủ tịch hội đồng:</b>&nbsp;{{ $council->user1 }}</p>
                                        <p><b>Phản biện 1:</b>&nbsp;{{ $council->user2 }}</p>
                                        <p><b>Phản biện 2:</b>&nbsp;{{ $council->user3 }}</p>
                                        <p><b>Ủy viên:</b>&nbsp;{{ $council->user4 }}</p>
                                        <p><b>Thư kí:</b>&nbsp;{{ $council->user5 }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $council->phone1 }}</p>
                                        <p>{{ $council->phone2 }}</p>
                                        <p>{{ $council->phone3 }}</p>
                                        <p>{{ $council->phone4 }}</p>
                                        <p>{{ $council->phone5 }}</p>
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