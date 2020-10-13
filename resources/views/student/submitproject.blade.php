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
                        <label for="inputUser" class="col-sm-2 col-form-label">Miêu tả</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" id="inputUser">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUser" class="col-sm-2 col-form-label">File báo cáo</label>
                        <div class="col-sm-10">
                            <input name="file" type="file">
                        </div>
                    </div>
                    <button type="reset" class="btn btn-danger">Hủy</button>
                    <button type="submit" class="btn btn-warning">Gửi</button>
                </form>
            </div>
        </div>
    </div>
</div>
