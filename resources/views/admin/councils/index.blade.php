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
                    Thêm hội đồng chấm đồ án
                </div>
                @include('admin.councils._form', [
                    'action' => url('/admin/councils'),
                    'input' => '',
                ])
            </div>
        </div>
    </div>

    <hr>

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
                                <th>Sửa</th>
                                <th>Xóa</th>
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
                                    <td>
                                        <a href="{{ url('/admin/councils/' . $council->id . '/edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ url('admin/councils/' . $council->id) }}">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete?')"><i class="fa fa-trash"></i></button>
                                        </form>
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