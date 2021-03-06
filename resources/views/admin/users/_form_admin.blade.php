<div class="form-group">
	<label class="col-md-3 control-label" for="user_code" focus>Mã quản trị</label>
	<div class="col-md-3">
		<input type="text" name="user_code" class="form-control" required="" value="{{isset($user->id) ? $user->id : ''}}">
	</div>
</div>
<div class="form-group">
	<label class="col-md-3 control-label" for="name" focus>Tên</label>
	<div class="col-md-3">
		<input type="text" name="name" class="form-control" required="" value="{{isset($user->name) ? $user->name : ''}}">
	</div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label" for="email">Email</label>
    <div class="col-md-5">
        <input type="email" name="email" class="form-control" required="" value="{{isset($user->email) ? $user->email : '' }}">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label" for="date_of_birth">Ngày sinh</label>
    <div class="col-md-3">
        <input type="date" name="date_of_birth" class="form-control" required="" value="{{isset($user->date_of_birth) ? $user->date_of_birth : ''}}">
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label" for="gender">Giới tính</label>
    <div class="col-md-5">
        <input type="radio" name="gender" value="0" {{(isset($user->gender) && $user->gender == 0) ? 'checked' :''}}> Nam
  		<input type="radio" name="gender" value="1" {{(isset($user->gender) && $user->gender == 1) ? 'checked' :''}}> Nữ
    </div>
</div>
<div class="form-group">
	<label class="col-md-3 control-label" for="address">Địa chỉ</label>
	<div class="col-md-5">
		<textarea class="form-control" rows="5" name="address">{{(isset($user->address) ? $user->address : ''}}</textarea>
	</div>
</div>
<div class="form-group">
	<label class="col-md-3 control-label" for="phone">Số điện thoại</label>
	<div class="col-md-3">
		<input type="text" name="phone" class="form-control" required="" value="{{isset($user->phone) ? $user->phone : ''}}">
	</div>
</div>
<div class="form-group">
	<div class="col-md-3"></div>
	<div class="col-md-3">
		<button id="create_student" name="create" class="btn btn-success">
			<i class="fa fa-plus-square"></i>&nbsp;Cập nhật
		</button>
	</div>
</div>
