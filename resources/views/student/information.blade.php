@extends('student.navbar')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i>Thong tin tai khoan</li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Tên Đăng Nhập</label>
                    <div class="col-sm-10">
                        {{ $infor->username }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Họ và tên</label>
                    <div class="col-sm-10">
                        {{ $infor->full_name }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Ngày sinh</label>
                    <div class="col-sm-10">
                        {{ \Carbon\Carbon::parse($infor->date_of_birth)->format('d/m/Y') }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        {{ $infor->email }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                        {{ $infor->phone_number }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Khóa</label>
                    <div class="col-sm-10">
                        {{ $infor->student->school_year }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Lớp</label>
                    <div class="col-sm-10">
                        {{ $infor->student->class }}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputUser" class="col-sm-2 col-form-label">Mã sinh viên</label>
                    <div class="col-sm-10">
                        {{ $infor->student->student_code }}
                    </div>
                </div>
                <button class="btn-warning"><a href="{{ route('inforstudent') }}">Sửa</a></button>
            </div>
        </div>
    </div>
</div>
