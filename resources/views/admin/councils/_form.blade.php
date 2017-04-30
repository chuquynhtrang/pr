<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="{{ $action }}">
                {{ csrf_field() }}
                {!! $input !!}
                <div class="form-group">
                    <label for="place" class="control-label">Địa điểm: </label>
                    <input class="form-control" value="{{ isset($council) ? $council->place : '' }}" name="place">
                </div>
                <div class="form-group">
                    <label for="time" class="control-label">Thời gian bảo vệ: </label>
                    <input type="datetime-local" class="form-control" value="{{ isset($council) ? $council->time : '' }}" name="time">
                </div>
                <div class="form-group">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary form-control">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>