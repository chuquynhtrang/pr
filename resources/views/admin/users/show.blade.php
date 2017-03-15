@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <h2>Thông tin người dùng</h2>
        <hr>
        <div class="col-md-12">
            <a href="{{ url('admin/users/'.$role)}}" class="btn btn-default btn-md"><i class="fa fa-chevron-left"></i>&nbsp;Back</a>
        </div>
        <div class="col-md-4">
            <div class="col-md-2"></div>
            <div class="col-md-2" align="center">
                @if($user->role == 2)
                    <img alt="User Pic" src="../../../../{{ $user->avatar }}" id="show_avatar">
                @elseif($user->role ==1)
                    <img alt="User Pic" src="{{ $user->avatar }}" id="show_avatar">
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <h2>Chi tiết</h2>
            <div class=" col-md-9 col-lg-9 ">
                <table class="table table-user-information">
                    <tbody>
                        <tr>
                            <td>Tên</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>{{ $user->address }}</td>
                        </tr>

                        <tr>
                            <td>Số điện thoại</td>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <td>Khóa học</td>
                            <td>{{ $user->course}}</td>
                        </tr>
                        <tr>
                            <td>Lớp học</td>
                            <td>{{ $user->group }}</td>
                        </tr>
                        <tr>
                            <td>Điểm số</td>
                            <td>{{ $user->score }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection