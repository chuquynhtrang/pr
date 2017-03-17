<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <form role="form" class="form-inline" method="POST" action="{{ $action }}">
                {{ csrf_field() }}
                {!! $input !!}
                <div class="form-group">
                    <label for="name">Địa điểm: </label>
                    <input class="form-control" id="input-name" value="{{ isset($council) ? $council->name : '' }}" name="name">
                </div>
                <button type="submit" class="btn btn-danger">Cập nhật</button>
            </form>
        </div>
    </div>
</div>