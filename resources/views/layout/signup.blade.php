@extends('layout.index')

<div class="container">
    <h2>Đăng ký thành viên</h2>
    <form class="form-signup" action="{{ route('signup') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="inputUsername">Tên Đăng Nhập*</label>
            <input type="text" name="username" class="form-control username" id="inputUsername"
                   placeholder="Nhập tên">
            <p class="error-msg"></p>
        </div>

        <div class="form-group">
            <label for="inputPassword">Mật Khẩu*</label>
            <input type="password" name="password" class="form-control password" id="inputPassword"
                   placeholder="Nhập mật khẩu">
            <p class="error-msg"></p>
        </div>

        <div class="form-group">
            <label for="inputFullName">Họ Và Tên*</label>
            <input type="text" name="full_name" class="form-control full-name" id="inputFullName" placeholder="Nhập họ và tên">
            <p class="error-msg"></p>
        </div>

        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control email" id="inputEmail"
                   placeholder="Nhập email">
            <p class="error-msg"></p>
        </div>

        {{-- Cục bên dưới ko cần, bỏ --}}
        <div class="form-group">
            <label for="inputRole">Vai trò</label>
            <select name="type" class="form-control">
                <option value="1">Sinh Viên</option>
                <option value="2">Giáo Viên</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Đăng ký</button>

    </form>
</div>
