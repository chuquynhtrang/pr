@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kiểm tra tiến độ</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @foreach($diaries as $value)
        @foreach($value as $diary)
        <h3>{{ $diary->user->name }}</h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Ngày cập nhật: {{ $diary->created_at }}</div>
                    <div class="panel-body progress-details">
                        <div class="progress">
                            <div class="progress-bar active" role="progressbar"
                                aria-valuenow="{{ $diary->progress }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $diary->progress }}%">
                            </div>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-default btn-sm view_diary" onclick="viewDiary({{$diary->id}})">Chi tiết&nbsp;<i class="fa fa-angle-double-down"></i></button>
                        </div>
                        <div class="progress-text-{{$diary->id}}" style="display: none; margin-top: 60px;">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="complete">% Hoàn thành: </label>
                                <div class="col-md-9">
                                    <p>{{$diary->progress}}&nbsp;%</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="complete">Hoàn thành: </label>
                                <div class="col-md-9">
                                    <p>{{$diary->complete}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="not_complete">Chưa xong: </label>
                                <div class="col-md-9">
                                    <p>{{$diary->not_complete}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="advantage">Thuận lợi: </label>
                                <div class="col-md-9">
                                    <p>{{$diary->advantage}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="difficult">Khó khăn: </label>
                                <div class="col-md-9">
                                    <p>{{$diary->difficult}}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="expected">Dự kiến: </label>
                                <div class="col-md-9">
                                    <p>{{$diary->expected}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @endforeach
    @endforeach
</div>
@endsection

@section('script')
    <script type="text/javascript">
        function viewDiary($id) {
            $('.progress-text-' + $id).toggle();
        }
    </script>
@endsection