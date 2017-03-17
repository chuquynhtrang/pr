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
	        <div class="col-lg-12">
	         	<div class="panel panel-default">
		    		<div class="panel-body">
		    			<form method="POST" action="{{url('user/progress')}}" class="form-horizontal" enctype="multipart/form-data">
		    				<div class="form-group">
								<label class="col-md-2 control-label" for="name" focus>Phần trăm công việc</label>
								<div class="col-md-5">
									<div class="progress">
  										<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
    										40%
  										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="description">Note</label>
								<div class="col-md-7">
									<textarea class="form-control" rows="10" name="description"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="references" focus>Upload tài liệu đã thực hiện</label>
								<div class="col-md-5">
									<input type="file" name="references">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2"></div>
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