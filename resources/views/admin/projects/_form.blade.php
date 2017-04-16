<div class="form-group">
	<label class="col-md-2 control-label" for="name" focus>Tên đề tài</label>
	<div class="col-md-5">
		<input type="text" name="name" class="form-control" required="" value="{{isset($project->name) ? $project->name : ''}}">
	</div>
</div>
<div class="form-group">
	<label class="col-md-2 control-label" for="description">Hướng thực hiện</label>
	<div class="col-md-7">
		<textarea class="form-control" rows="10" name="description">{{isset($project->description) ? $project->description : ''}}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-md-2 control-label" for="references" focus>Tài liệu tham khảo</label>
	<div class="col-md-5">
		{{isset($project->references) ? $project->references : ''}}
		<input type="file" name="references">
	</div>
</div>
<div class="form-group">
	<div class="col-md-2"></div>
	<div class="col-md-3">
		<button id="create_student" name="create" class="btn btn-success">
			Cập nhật
		</button>
	</div>
</div>
