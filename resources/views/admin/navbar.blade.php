@extends('layout.index')

<div id="wrapper">
    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">

                <li class="">
                    <a href="{{ route('getuser') }}"><i class="fa fa-dashboard"></i> Quản lý tài khoản </a>
                </li>
                <li><a href="{{ route('getcreateuser') }}">
                        <i class="fa fa-bar-chart-o"></i>Tạo tài khoản mới</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fa fa-table"></i> Đăng xuất </a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
