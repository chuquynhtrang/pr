@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Đề tài</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <div class="row">
        <a href="{{ url('teacher/projects/create')}}" class="btn btn-success btn-md" id="create-form">Thêm đề tài</a>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading table-panel">
                    Danh sách đề tài
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên đề tài</th>
                                <th>Miêu tả</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
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