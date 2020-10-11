@extends('student.navbar')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Trạng thái đề tài</li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <h2>Trạng thái đề tài</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover tablesorter">
                    <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="55%">Tiêu đề</th>
                        <th width="20%">Ngày gửi</th>
                        <th width="20%">Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($topic as $index => $topics)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $topics->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($topics->date_of_birth)->format('d/m/Y') }}</td>
                            @if($topics->topic_status == 0 )
                                <td>Chờ duyệt</td>
                            @elseif($topics->topic_status == 1 )
                                <td>Đã duyệt</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
