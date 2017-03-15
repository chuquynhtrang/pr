@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <div class="row">
        <a href="{{ url('admin/users/'.$role.'/create')}}" class="btn btn-success btn-md" id="create-form">Create User</a>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading table-panel">
                    User Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        @if($user->role == 1)
                                            <a href="{{url('/admin/users/'. $role . '/show/' . $user->id) }}"><img src="{{ $user->avatar }}"  class="user_avatar"></a>
                                        @elseif($user->role == 2)
                                            <a href="{{url('/admin/users/'. $role . '/show/' . $user->id) }}"><img src="../../{{ $user->avatar }}"  class="user_avatar"></a>
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="{{url('/admin/users/'. $role . '/show/' . $user->id) }}" class="btn btn-default btn-sm"><i class="fa fa-info-circle"></i>&nbsp;View</a>
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