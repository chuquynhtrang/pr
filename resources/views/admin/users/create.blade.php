@extends('layouts.app')

@section('content')
<div id="page-wrapper">
	<div class="row">
	    <div class="col-lg-12">
	        <h1 class="page-header">User</h1>
	    </div>

	    <!-- /.col-lg-12 -->
	    <div class="row">
		    <div class="col-lg-12">
			 	@include('layouts.partials.errors')
			    @include('layouts.partials.success')
		        <div class="panel panel-default">
		            <div class="panel-heading table-panel">
		                Thêm mới người dùng
		            </div>

		    		<div class="panel-body">
		    			<form method="POST" action="{{url('admin/users/'. $role . '/store')}}" class="form-horizontal">
							{{csrf_field()}}
							@if($role == 0)
			    				@include('admin.users._form_student')
			    			@elseif($role == 1)
			    				@include('admin.users._form_admin')
			    			@else
			    				@include('admin.users._form_teacher')
			    			@endif
			    		</form>
		    		</div>
		    	</div>
	    	</div>
    	</div>
	</div>
</div>
@endsection