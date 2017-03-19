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
	    	<div class="col-lg-5">
		    	@foreach($diaries as $diary)
			    	<div class="panel panel-default">
			    		<div class="panel-heading">Ngày cập nhật: {{ $diary->created_at }}</div>
		        		<div class="panel-body">
				        	<div class="progress">
  								<div class="progress-bar progress-bar-striped active" role="progressbar"
  									aria-valuenow="{{ $diary->progress }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $diary->progress }}%">
    								{{ $diary->progress }}%
  								</div>
							</div>
							<div class="pull-right">
								<button class="btn btn-default btn-sm view_diary" onclick="viewDiary({{$diary->id}})">View&nbsp;<i class="fa fa-angle-double-down"></i></button>
							</div>
							<div class="progress-text-{{$diary->id}}" style="display: none; margin-top: 60px;">
								<div class="form-group">
									<label class="col-md-3 control-label" for="note">Note: </label>
									<div class="col-md-9">
										<p>{{$diary->note}}</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="document" focus>Tài liệu: </label>
									<div class="col-md-9">
										<a href="http://localhost/pr/public/diaries/{{$diary->document}}" target="_blank" class="form-text">{{$diary->document}}</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endforeach
	        </div>
	        <div class="col-lg-7">
	         	<div class="panel panel-default">
	         		<div class="panel-heading">Tiến độ công việc</div>
		    		<div class="panel-body">
		    			<form method="POST" action="{{url('user/progress')}}" class="form-horizontal" enctype="multipart/form-data">
		    				{{csrf_field()}}
		    				<div class="form-group">
								<label class="col-md-3 control-label" for="name" focus>% hoàn thành</label>
								<div class="col-md-3">
  									<input type="text" name="progress" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="note">Note</label>
								<div class="col-md-9">
									<textarea class="form-control" rows="3" name="note"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="document" focus>Tài liệu</label>
								<div class="col-md-5">
									<input type="file" name="document">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-3"></div>
								<div class="col-md-3">
									<button id="create_student" name="create" class="btn btn-success">
										Submit
									</button>
								</div>
							</div>
			    		</form>
		    		</div>
		    	</div>
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
