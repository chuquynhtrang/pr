@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hội đồng bảo vệ</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading table-panel">
                    Danh sách hội đồng bảo vệ
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Địa điểm</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($councils as $council)
                                <tr>
                                    <td>{{ $council->id }}</td>
                                    <td>{{ $council->place }}</td>
                                    <td>{{ $council->created_at }}</td>
                                    <td>{{ $council->updated_at }}</td>
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