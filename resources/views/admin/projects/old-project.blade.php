@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đồ án các năm trước</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading table-panel">
                    Thêm đồ án
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
                    Danh sách đồ án các năm trước
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>Mã đồ án</th>
                                <th>Tên đồ án</th>
                                <th>Miêu tả</th>
                                <th>Tài liệu tham khảo</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->refrences }}</td>
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