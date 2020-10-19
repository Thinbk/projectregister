@extends('teacher.navbar')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Duyệt hủy đề tài </li>
                </ol>
            </div>
        </div><!-- /.row -->
        <h2>Hủy đề tài</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
                <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="30%">Tiêu đề</th>
                    <td width="40%">Tên sinh viên</td>
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
                            <a onclick="return confirm('Bạn có chắc chắn cho phép sinh viên hủy đề tài này?')" class="btn btn-warning" href="{{ route('postconfirmcancel', ['id' => $topic->id]) }}">Xác nhận hủy</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

