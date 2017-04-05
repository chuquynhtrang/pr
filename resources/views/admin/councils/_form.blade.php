<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <form role="form" class="form-inline" method="POST" action="{{ $action }}">
                {{ csrf_field() }}
                {!! $input !!}
                <div class="form-group">
                    <label for="name">Địa điểm: </label>
                    <input class="form-control" id="input-name" value="{{ isset($council) ? $council->place : '' }}" name="place">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>