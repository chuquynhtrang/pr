<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body style="font-family: 'times new roman';">
    <div id="app">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3" style="margin-top: 30px; text-align: center;">
                <div style="float: left; font-size: 18px;">
                    TRƯỜNG ĐH KT - HC CAND<br>
                    <strong><u>KHOA CÔNG NGHỆ THÔNG TIN</u></strong>
                </div>
                <div style="float: right; font-size: 18px;">
                    CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                        <strong><u>Độc lập - Tự do - Hạnh phúc</u></strong><br>
                        <i>Bắc Ninh, ngày&nbsp;&nbsp;&nbsp;&nbsp;tháng&nbsp;&nbsp;&nbsp;&nbsp;năm 201&nbsp;&nbsp;</i>
                </div>
            </div>
            <br><br><br>
            <div class="col-lg-12" style="margin-bottom: 30px;">
                <div style="text-align: center; font-size: 20px;margin-top: 40px;"><strong>BÁO CÁO</strong></div>
                <div style="text-align: center; font-size: 18px;"><strong>Tiến độ thực hiện đồ án tốt nghiệp</strong></div>
            </div>
            <div class="col-lg-12" style="font-size: 18px;">
                <div class="col-lg-6 col-lg-offset-3">
                @foreach ($userProject as $up)
                    <ol>
                        <li>Tên đề tài: {{ $up->project->name }}</li>
                        <li>Họ và tên học viên: {{ $up->user->name }}</li>
                        <li>Họ và tên giảng viên hướng dẫn: {{ $up->project->teacher_id }}</li>
                        <li>Tiến độ công việc:
                            <ul style="list-style-type: square;">
                                <li style="height: 80px;">Công việc đã hoàn thành: {{ $diary->complete }}</li>
                                <li style="height: 80px;">Công việc chưa hoàn thành: {{ $diary->un_complete }}</li>
                                <li style="height: 80px;">Dự kiến công việc tiếp theo: {{ $diary->expected }}</li>
                                <li style="height: 80px;">Thuận lợi: {{ $diary->advantage }}</li>
                                <li style="height: 80px;">Khó khăn: {{ $diary->difficult }}</li>
                            </ul>
                        </li>
                        <li>Ý kiến của giảng viên hướng dẫn:
                            <ul style="list-style-type: square;">
                                <li style="height: 80px;"></li>
                                <li style="height: 80px;"></li>
                                <li style="height: 80px;"></li>
                            </ul>
                        </li>
                    </ol>
                @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-lg-offset-3" style="margin-top: 50px; text-align: center;">
                <div style="float: left; font-size: 18px;">
                    <strong>GIẢNG VIÊN HƯỚNG DẪN</strong><br>
                    <i>(Kí và ghi rõ họ tên)</i>
                </div>
                <div style="float: right; font-size: 18px;">
                    <strong>GIẢNG VIÊN HƯỚNG DẪN</strong><br>
                    <i>(Kí và ghi rõ họ tên)</i>
                </div>
            </div>
            <div class="col-lg-4 col-lg-offset-4" style="margin-top: 150px; text-align: center;">
                <div style="font-size: 18px;">
                    <strong>LÃNH ĐẠO KHOA QUẢN LÝ</strong><br>
                    <i>(Kí và ghi rõ họ tên)</i>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
</body>