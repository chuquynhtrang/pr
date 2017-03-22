@extends('layouts.app')

@section('content')
<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
			@foreach($news as $new)
	            <div class="panel panel-default">
	                <div class="panel-body">
							<h1>{!! $new->title !!}</h1><hr>
							<p>{!! $new->body !!}</p>
					</div>
					<div class="panel-footer">Panel Footer</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection