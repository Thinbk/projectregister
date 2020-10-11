@extends('student.navbar')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Đăng ký đề tài</li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-9">
                <form action="{{ route('posttopic') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Tên Đề Tài*</label>
                        <div class="col-sm-10">
                            <textarea name="nametopic" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputTeacherCode" class="col-sm-2 col-form-label">Mã Số Giáo Viên Hướng Dẫn</label>
                        <div class="col-sm-10">
                            <input type="text" name="lecturer_id" class="form-control" id="inputTeacherCode">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputTeacher" class="col-sm-2 col-form-label">Tên Giáo Viên Hướng Dẫn</label>
                        <div class="col-sm-10">
                            <input type="text" name="teacher" class="form-control" id="inputTeacher">
                        </div>
                    </div>

                    <button type="reset" class="btn btn-danger">Hủy</button>
                    <button type="submit" class="btn btn-warning">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
