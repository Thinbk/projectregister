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
                        <th width="25%">Giáo viên hướng dẫn</th>
                        <th width="15%">Ngày gia hạn</th>
                        <th width="15%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($extendtopic as $index => $extendtopic)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $extendtopic->name }}</td>
                            <td>{{ $extendtopic->lecturer->user->full_name }}</td>
                            <td>
                                @if($extendtopic->extend_topic_status == '')
                                    {{ \Carbon\Carbon::parse($extendtopic->date)->format('d/m/Y') }}
                                @elseif($extendtopic->extend_topic_status == 1)
                                    {{ \Carbon\Carbon::parse($extendtopic->extend_date)->format('d/m/Y') }} (chờ duyệt)
                                @else
                                    {{ \Carbon\Carbon::parse($extendtopic->extend_date)->format('d/m/Y') }} (đã duyệt)
                                @endif
                            </td>
                            <td>
                                @if($extendtopic->extend_topic_status == '')
                                    <button class="btn-warning"><a href="{{ route('getform') }}">Gia Hạn đề tài</a>
                                    </button>
                                @else
                                    <p> Đã gia hạn </p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
