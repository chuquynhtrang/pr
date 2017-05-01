<div class="panel-body">
    <form role="form" method="POST" action="{{ $action }}">
        {{ csrf_field() }}
        {!! $input !!}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="place" class="control-label">Địa điểm: </label>
                    <input class="form-control" value="{{ isset($council) ? $council->place : '' }}" name="place" required="required">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="time" class="control-label">Thời gian bảo vệ: </label>
                    <input type="datetime-local" class="form-control" value="{{ isset($council) ? $council->time : '' }}" name="time" required="required">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="user1" class="control-label">Người chấm 1: </label>
                    <input class="form-control" value="{{ isset($council) ? $council->user1 : '' }}" name="user1" required="required">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone1" class="control-label">Số điện thoại: </label>
                    <input type="number" class="form-control" value="{{ isset($council) ? $council->phone1 : '' }}" name="phone1" maxlength="11" required="required">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="user2" class="control-label">Người chấm 2: </label>
                    <input class="form-control" value="{{ isset($council) ? $council->user2 : '' }}" name="user2" required="required">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone2" class="control-label">Số điện thoại: </label>
                    <input type="number" class="form-control" value="{{ isset($council) ? $council->phone2 : '' }}" name="phone2" maxlength="11" required="required">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="user3" class="control-label">Người chấm 3: </label>
                    <input class="form-control" value="{{ isset($council) ? $council->user3 : '' }}" name="user3" required="required">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone3" class="control-label">Số điện thoại: </label>
                    <input type="number" class="form-control" value="{{ isset($council) ? $council->phone3 : '' }}" name="phone3" maxlength="11" required="required">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="user4" class="control-label">Người chấm 4: </label>
                    <input class="form-control" value="{{ isset($council) ? $council->user4 : '' }}" name="user4" required="required">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone4" class="control-label">Số điện thoại: </label>
                    <input type="number" class="form-control" value="{{ isset($council) ? $council->phone4 : '' }}" name="phone4" maxlength="11" required="required">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="user5" class="control-label">Người chấm 5: </label>
                    <input class="form-control" value="{{ isset($council) ? $council->user5 : '' }}" name="user5" required="required">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="phone5" class="control-label">Số điện thoại: </label>
                    <input type="number" class="form-control" value="{{ isset($council) ? $council->phone5 : '' }}" name="phone5" maxlength="11" required="required">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary form-control">Cập nhật</button>
            </div>
        </div>
    </form>
</div>