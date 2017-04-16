@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đổi mật khẩu</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        @if (Auth::user()->isAdmin())
                            <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url('admin/change-password/'. $user->id) }}">
                        @elseif (Auth::user()->isTeacher())
                            <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url('teacher/change-password/'. $user->id) }}">
                        @else
                            <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url('user/change-password/'. $user->id) }}">
                        @endif
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="old-password">Mật khẩu cũ: </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="old_password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="new-password">Mật khẩu mới: </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="new_password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="re-password" focus>Nhập lại: </label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="re_password" required>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-4"></div>
                            <div class="col-md-3">
                                <button name="create" class="btn btn-success">
                                    Cập nhật
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection