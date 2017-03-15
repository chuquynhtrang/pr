@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách biểu mẫu</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @include('layouts.partials.errors')
    @include('layouts.partials.success')

    <form method="POST" action="{{ url('admin/forms/upload') }}" enctype="multipart/form-data">
        <div class="form-inline">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="file" name="form">
            </div>
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-upload"></i>&nbsp;Upload</button>
        </div>
    </form>
    <hr>
    <div class="row">
        <div class="panel panel-default">
                <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table-form table-striped table-hover" id="dataTables">
                    <thead>
                        <tr>
                            <th>Tên biểu mẫu</th>
                            <th>Ngày tạo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($forms as $form)
                            <tr>
                                <td>
                                    <a href="http://localhost/demo/public/uploads/{{$form->name}}" target="_blank">
                                        <img src="../images/document.png" alt="..." class="form-image">
                                    </a>
                                    <a href="http://localhost/demo/public/uploads/{{$form->name}}" target="_blank" class="form-text">{{ $form->name }}</a>
                                </td>
                                <td>{{ $form->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                <!-- /.panel-body -->
        </div>
    </div>
</div>
@endsection