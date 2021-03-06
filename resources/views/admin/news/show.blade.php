@extends('layouts.app')

@section('content')
<div id="page-wrapper" style="margin-top: 30px;">
	<div class="row">
		<div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="panel panel-default">
            	<div class="panel-heading">
					<h4><b>{!! $new->title !!}</b></h4>
					<form method="POST" action="{{ url('admin/news/' . $new->id) }}">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete?')"><i class="fa fa-trash"></i></button>
                    </form>
				</div>
                <div class="panel-body">
					<div class="info-news">
						<i class="fa fa-clock-o fa-fw"></i>&nbsp; {{ $new->created_at }}&nbsp;&nbsp;
						@foreach($fileNews as $file)
							@if($file->new_id == $new->id)
								<i class="fa fa-paperclip"></i>
								<a href="http://localhost/pr/public/uploads/filenews/{{$file->name}}" target="_blank">{{$file->name}}</a>
							@endif
						@endforeach
					</div>
					<p>{!! $new->body !!}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection