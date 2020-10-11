@extends('student.navbar')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i>Gia hạn đề tài</li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <h2>Gia hạn đề tài</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover tablesorter">
                    <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="40%">Tiêu đề</th>
                        <th width="15%">Tên giáo viên</th>
                        <th width="15%">Tên sinh viên</th>
                        <th width="10%">Ngày gửi</th>
                        <th width="15%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($extendtopic as $index => $extendtopic)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $extendtopic->name }}</td>
                            <td>{{ $extendtopic->lecturer_name }}</td>
                            <td>{{ $extendtopic->lecturer_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($extendtopic->created_at)->format('d/m/Y') }}</td>
                            <td>
                                <button class="btn-warning"> Gia Hạn đề tài</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
