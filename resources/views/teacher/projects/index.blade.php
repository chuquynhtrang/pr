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
        <a href="{{ url('teacher/projects/create')}}" class="btn btn-success btn-md {{ $checkButton ? 'disabled' : '' }}" id="create-form" >Thêm đề tài</a>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-12">
            @if (isset($message))
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @endif
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
                                <th>Hướng thực hiện</th>
                                <th>Tài liệu tham khảo</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>
                                        <a href="http://localhost/pr/public/uploads/references/{{$project->references}}" target="_blank">{{ $project->references }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/teacher/projects/' . $project->id . '/edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ url('teacher/projects/' . $project->id) }}">
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