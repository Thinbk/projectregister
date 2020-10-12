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
                        <label for="inputUser" class="col-sm-2 col-form-label">Mã đề tài</label>
                        <div class="col-sm-10">
                            <select name="topic_code" class="form-control">
                                <option value="IT1890">IT1890</option>
                                <option value="IT1490">IT1490</option>
                                <option value="IT2890">IT2890</option>
                                <option value="IT1023">IT1023</option>
                                <option value="IT1099">IT1099</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputTeacher" class="col-sm-2 col-form-label">Tên Giáo Viên Hướng Dẫn</label>
                        <div class="col-sm-10">
                            <input type="text" name="teacher" class="form-control" id="inputTeacher">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputTeacherCode" class="col-sm-2 col-form-label">Mã Số Giáo Viên Hướng Dẫn</label>
                        <div class="col-sm-10">
                            <select name="lecturer_id" class="form-control">
                                <option value="12345">12345</option>
                                <option value="12346">12346</option>
                                <option value="12347">12347</option>
                                <option value="12348">12348</option>
                                <option value="12349">12349</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputDate" class="col-sm-2 col-form-label">Ngày hạn</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" class="form-control" id="inputDate">
                        </div>
                    </div>

                    <button type="reset" class="btn btn-danger">Hủy</button>
                    <button type="submit" class="btn btn-warning">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
