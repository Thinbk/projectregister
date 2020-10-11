@extends('student.navbar')

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12sdf">
                <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-dashboard"></i> Nộp báo cáo </li>
                </ol>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-9">
                <form action="{{ route('submit') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Họ và tên</label>
                        <div class="col-sm-10">
                            nguyen dang thin
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Mã số</label>
                        <div class="col-sm-10">
                            nguyen dang thin
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Khoa</label>
                        <div class="col-sm-10">
                            CNTT
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Tên đề tài</label>
                        <div class="col-sm-10">
                            CNTT
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">File báo cáo</label>
                        <div class="col-sm-10">
                            CNTT
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Mô tả</label>
                        <div class="col-sm-10">
                            <input name="filesTest" type="file">
                        </div>
                    </div>

                    <button type="reset" class="btn btn-danger">Hủy</button>
                    <button type="submit" class="btn btn-warning">Gửi</button>
                </form>
            </div>
        </div>

    </div>
</div>
