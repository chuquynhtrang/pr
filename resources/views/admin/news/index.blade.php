@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm tin tức</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="{{url('admin/news')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-md-2" for="name">Tiêu đề: </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2" for="name">Nội dung: </label>
                            <div class="col-md-10">
                                <textarea name="body" id="body" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="references" focus>Tài liệu</label>
                            <div class="col-md-10">
                                <input type="file" name="files" id="file-news">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6"></div>
                            <div class="col-md-3">
                                <button name="create" class="btn btn-success">
                                    Submit
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