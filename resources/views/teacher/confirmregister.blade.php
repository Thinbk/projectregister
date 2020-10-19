@extends('teacher.navbar')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Duyệt đăng ký đề tài đề tài </li>
                </ol>
            </div>
        </div><!-- /.row -->
        <h1>Xác nhận đăng ký đề tài</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
                <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="30%">Tiêu đề</th>
                    <th width="40%">Tên sinh viên</th>
                    <th width="10%">Ngày gửi</th>
                    <th width="15%">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($topics as $index => $topic)
                    <tr>
                        <td> {{ $index+1 }} </td>
                        <td>{{ $topic->name }}</td>
                        <td>{{ $topic->student->user->full_name }}</td>
                        <td>{{ \Carbon\Carbon::parse($topic->created_at)->format('d/m/Y') }}</td>
                        <td>
                            @if($topic->topic_status == 1)
                                Đã Duyệt
                            @else
                            <a class="btn btn-warning" href="{{ route('postconfirmregister',['id' => $topic->id]) }}">Xác nhận </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

