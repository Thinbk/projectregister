@extends('layout.index')

<div class="container">
    <h2>Đăng nhập</h2>
    <form action="{{ route('postLogin') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="inputUsername">Tên Đăng Nhập</label>
            <input type="text" name="username" class="form-control" id="inputUsername" aria-describedby="emailHelp" placeholder="Nhập tên">
        </div>

        <div class="form-group">
            <label for="inputPassword">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mật khẩu">
        </div>

        <a href="{{ route('getsignup') }}">Đăng ký tài khoản</a>
        <br>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
