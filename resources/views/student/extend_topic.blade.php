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
                                @if(!is_null($extendtopic->extend_topic_status))
                                    @if($extendtopic->extend_topic_status == 0)
                                        {{ \Carbon\Carbon::parse($extendtopic->extend_date)->format('d/m/Y') }} (Chờ duyệt)
                                    @elseif($extendtopic->extend_topic_status == 1)
                                        {{ \Carbon\Carbon::parse($extendtopic->extend_date)->format('d/m/Y') }} (Đã duyệt)
                                    @else
                                        {{ \Carbon\Carbon::parse($extendtopic->date)->format('d/m/Y') }} (Không được duyệt)
                                    @endif
                                @else
                                    {{ \Carbon\Carbon::parse($extendtopic->date)->format('d/m/Y') }}
                                @endif
                            </td>
                            <td>
                                {{--
                                extend_topic_status:
                                NULL - chưa gia hạn(mặc định)
                                0 - đã gia hạn và chờ giáo viên duyệt
                                1 - giáo viên đã duyệt
                                2 - giáo viên đã hủy duyệt
                                --}}

                                @if(!is_null($extendtopic->extend_topic_status))
                                    @if($extendtopic->extend_topic_status == 0)
                                       <p>Đã gia hạn đề tài</p>
                                    @elseif($extendtopic->extend_topic_status == 1)
                                        <p>Đề tài đã được gia hạn</p>
                                    @elseif($extendtopic->extend_topic_status == 2)
                                        <p>Đề tài không được gia hạn</p>
                                    @endif
                                @elseif($extendtopic->cancel_topic_status)
                                    <p>Đề tài đã được hủy</p>
                                @else
                                    <a class="btn btn-warning" href="{{ route('getform') }}">Gia Hạn đề tài</a>
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
