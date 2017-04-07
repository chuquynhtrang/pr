@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cập nhật tiến độ</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    @if(count($userProjects))
        @include('layouts.partials.errors')
        @include('layouts.partials.success')

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Tiến độ công việc</div>
                    <div class="panel-body">
                        <form method="POST" action="{{url('user/progress')}}" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name" focus>% hoàn thành</label>
                                <div class="col-md-3">
                                    <input type="text" name="progress" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="complete">Việc hoàn thành</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="3" name="complete" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="not_complete">Việc chưa hoàn thành</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="3" name="not_complete" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="advantage">Thuận lợi</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="3" name="advantage" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="difficult">Khó khăn</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="3" name="difficult" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="expected">Dự kiến</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="3" name="expected" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <button id="create_student" name="create" class="btn btn-success">
                                        Cập nhật
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                @foreach($diaries as $diary)
                    <div class="panel panel-default">
                        <div class="panel-heading">Ngày cập nhật: {{ $diary->created_at }}</div>
                        <div class="panel-body progress-details">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                    aria-valuenow="{{ $diary->progress }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $diary->progress }}%">
                                </div>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default btn-sm view_diary" onclick="viewDiary({{$diary->id}})">Chi tiết&nbsp;<i class="fa fa-angle-double-down"></i></button>
                            </div>
                            <div class="progress-text-{{$diary->id}}" style="display: none; margin-top: 60px;">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="complete">Tiến độ: </label>
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
                                <div class="pull-right">
                                    <a href="{{ url('user/progress/'. $diary->id) }}" class="btn btn-primary btn-sm">In tiến độ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-danger">
                    Bạn không thể cập nhật tiến độ. <a href="{{ url('user/projects') }}">Click để đăng kí đề tài</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@section('script')
    <script type="text/javascript">
        function viewDiary($id) {
            $('.progress-text-' + $id).toggle();
        }
    </script>
@endsection