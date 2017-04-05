@extends('layouts.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thống kê</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-check-circle-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $userRegisted }}</div>
                            <div>Sinh viên đã đăng kí</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-ban fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $userUnRegistered }}</div>
                            <div>Sinh viên chưa đăng kí</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-window-close-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $projectUnRegistered }}</div>
                            <div>Đồ án chưa đăng kí</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-window-maximize fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $projectRegisted }}</div>
                            <div>Đồ án đã đăng kí</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <canvas id="line-project"></canvas>
            </div>
            <div class="col-lg-3 col-lg-offset-1">
                <canvas id="pie-user"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <canvas id="line-diary"></canvas>
            </div>
            <div class="col-lg-3 col-lg-offset-1">
                <canvas id="pie-project"></canvas>
            </div>
        </div>
    </div>
    <!-- /.row -->
<!-- /.row -->
</div>
@endsection

@section('script')
<script>
window.onload = function() {
var ctx = document.getElementById("line-project");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!!json_encode($dateProject)!!},
        datasets: [{
            label: 'Đồ án được giảng viên tạo qua từng ngày',
            data: {!!json_encode($countProject)!!},
            backgroundColor: [
                '#009688'
            ]
        }]
    }
});

var user = document.getElementById("pie-user");
var pie = new Chart(user, {
    type: 'pie',
    data: {
        labels: [
        "Sinh viên đã đăng kí",
        "Đồ án chưa đăng kí",
        ],
        datasets: [
        {
            data: [{!!json_encode($userRegisted)!!}, {!!json_encode($userUnRegistered)!!}],
            backgroundColor: [
                "#CDDC39",
                "#4CAF50",
            ],
            hoverBackgroundColor: [
                "#AFB42B",
                "#1B5E20",
            ]
        }]
    }
});

var project = document.getElementById("pie-project");
var pie = new Chart(project, {
    type: 'pie',
    data: {
        labels: [
        "Đồ án đã đăng kí",
        "Đồ án chưa đăng kí",
        ],
        datasets: [
        {
            data: [{!!json_encode($projectRegisted)!!}, {!!json_encode($projectUnRegistered)!!}],
            backgroundColor: [
                "#FF5722",
                "#9E9E9E",
            ],
            hoverBackgroundColor: [
                "#BF360C",
                "#424242",
            ]
        }]
    }
});

var ctx = document.getElementById("line-diary");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!!json_encode($dateDiary)!!},
        datasets: [{
            label: 'Lượng sinh viên cập nhật tiến độ',
            data: {!!json_encode($countDiary)!!},
            backgroundColor: [
                '#01579B'
            ]
        }]
    }
});
};
</script>
@endsection