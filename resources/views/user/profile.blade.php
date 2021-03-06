@extends('layouts.app')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Profile</h1>
        </div>
        <!-- /.col-lg-12 -->
    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="{{ url('user/profile/'. $user->id) }}">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="text-center">
                                    <img id="show_avatar" src="{{ isset($user->avatar) ? $user->avatar : config('common.image_default') }}">
                                    <h6> Chọn ảnh </h6>
                                    <input type="file" name="avatar" class="text-center center-block well well-sm">
                                </div>
                                <div class="list-group">

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 personal-info">
                                <div class="form-group">
                                    <label for="user_code" class="col-lg-3 control-label">
                                        Mã sinh viên
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" name="user_code" value="{{$user->user_code}}" class="form-control" autofocus="autofocus">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-lg-3 control-label">
                                        Tên
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" name="name" value="{{$user->name}}" class="form-control" autofocus="autofocus">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mail" class="col-lg-3 control-label">
                                        Email
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                        <input type="text" name="email" value="{{$user->email}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date_of_birth" class="col-lg-3 control-label">
                                        Ngày sinh
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-edit fa-fw" aria-hidden="true"></i></span>
                                        <input type="date" name="date_of_birth" value="{{$user->date_of_birth}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date_of_birth" class="col-lg-3 control-label">
                                        Giới tính
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="radio" name="gender" value="0" {{($user->gender == 0) ? "checked" : '' }}> Nam
                                        <input type="radio" name="gender" value="1" {{($user->gender == 1) ? "checked" : '' }}> Nữ
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address" class="col-lg-3 control-label">
                                        Địa chỉ
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <input type="text" name="address" value="{{$user->address}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-lg-3 control-label">
                                        Số điện thoại
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="course" class="col-lg-3 control-label">
                                        Khóa học
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>
                                        <input type="text" name="course" value="{{$user->course}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="class" class="col-lg-3 control-label">
                                        Lớp
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-building" aria-hidden="true"></i></span>
                                        <input type="text" name="class" value="{{$user->class}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="score" class="col-lg-3 control-label">
                                        Điểm số
                                    </label>
                                    <div class="col-lg-8 input-group">
                                        <span class="input-group-addon"><i class="fa fa-map" aria-hidden="true"></i></span>
                                        <input type="text" name="score" value="{{$user->score}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-8">
                                        <button type="submit" class="btn btn-primary btn-md">Cập nhật</button>
                                        <a href="{{ url('/admin') }}" class="btn btn-default">Hủy</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop