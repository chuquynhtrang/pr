@extends('layouts.app')

@section('content')
<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">Đề tài</h1>
	    </div>

	    <!-- /.col-lg-12 -->
	    <div class="row">
		    <div class="col-lg-12">
			 	@include('layouts.partials.errors')
			    @include('layouts.partials.success')
		        <div class="panel panel-default">
		            <div class="panel-heading table-panel">
		                Thêm mới đề tài
		            </div>

		    		<div class="panel-body">
		    			<form method="POST" action="{{url('admin/old-projects')}}" class="form-horizontal" enctype="multipart/form-data">
							{{csrf_field()}}
			    			@include('admin.projects._form')
			    		</form>
		    		</div>
		    	</div>
	    	</div>
    	</div>
	</div>
</div>
@endsection