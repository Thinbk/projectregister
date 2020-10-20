@extends('teacher.navbar')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Duyệt gia hạn đề tài</li>
                </ol>
            </div>
        </div><!-- /.row -->
        <h1>Xác nhận gia hạn đề tài</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
                <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="30%">Tiêu đề</th>
                    <th width="30%">Tên sinh viên</th>
                    <th width="10%">Ngày gửi</th>
                    <th width="25%">Trạng thái</th>
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
                            {{--
                            extend_topic_status:
                            NULL - chưa gia hạn(mặc định)
                            0 - đã gia hạn và chờ giáo viên duyệt
                            1 - giáo viên đã duyệt
                            2 - giáo viên đã hủy duyệt
                            --}}
                            @if(!is_null($topic->extend_topic_status))
                                @if($topic->extend_topic_status == 0)
                                    <a style="margin-bottom: 5px" class="btn btn-danger" href="{{ route('getform') }}">Xác nhận gia hạn đề tài</a>
                                    <a class="btn btn-warning" href="{{ route('cancelextend',['id' => $topic->id]) }}">Không cho phép gia hạn</a>
                                @elseif($topic->extend_topic_status == 1)
                                    <p>Đề duyệt gia hạn đề tài</p>
                                @elseif($topic->extend_topic_status == 2)
                                    <p>Đã hủy duyệt gia hạn đề tài</p>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

