@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý người dùng</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <form method="POST" action="{{ url('admin/users/'. $role .'/importExcel') }}" enctype="multipart/form-data">
        <div class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="file" name="fileUser">
            </div>
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i>&nbsp;Import</button>
        </div>
    </form>
    <a href="{{ url('admin/users/'. $role .'/create') }}" class="pull-right btn btn-sm btn-primary" style="margin-bottom: 10px;">Thêm mới</a>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading table-panel">
                    Danh sách người dùng
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên</th>
                                <th>Chi tiết</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->user_code }}</td>
                                    <td>
                                        <a href="{{url('/admin/users/'. $role . '/show/' . $user->id) }}"><img src="{{ isset($user->avatar) ? $user->avatar : config('common.image_default') }}"  class="user_avatar"></a>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="{{url('/admin/users/'. $role . '/show/' . $user->id) }}" class="btn btn-default btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Xem</a>
                                    </td>
                                    <td>
                                        <a href="" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="">
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