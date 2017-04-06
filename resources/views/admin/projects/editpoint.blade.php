@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cập nhật điểm bảo vệ</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    @include('layouts.partials.errors')
    @include('layouts.partials.success')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="{{url('admin/points/' . $point->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-2" for="name">Mã sinh viên: </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="user_code" value="{{$point->user->user_code ?: ''}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="name">Tên sinh viên: </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="user" value="{{$point->user->name ?: ''}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="references" focus>Tên đề tài: </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="project" value="{{$point->project->name ?: ''}}" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="references" focus>Điểm: </label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="point" value="{{isset($point->point) ? $point->point : ''}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6"></div>
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
@endsection

@section('script')
    <script type="text/javascript">
        CKEDITOR.replace('body');
    </script>
@endsection