@extends('templates.main')

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="auth-div">
                <h1>Blogcil</h1>
                <form class="auth-form" method="POST" action="{{route('register')}}">
                    @csrf
                    <div style="color:#a3a3a3; display:flex;justify-content:center;font-weight: 500; width: 80%; text-align:center;">Đăng ký để sáng tạo theo phong cách của bạn.</div>
                    <div class="auth-form-group row">
                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}">

                    </div>
                    <div class="auth-form-group row">
                        <input type="text" name="name" placeholder="Tên tài khoản" value="{{old('name')}}">

                    </div>
                    <div class="auth-form-group row">
                        <input type="password" name="password" placeholder="Mật Khẩu">

                    </div>
                    <div class="auth-form-group row">
                        <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                    </div>
                    <button class="btn auth-form-button" type="submit">Đăng Ký</button>
                </form>
                <p style="text-decoration:none; color:#a3a3a3; margin-bottom:20px; width:80%; text-align:center">Bằng cách đăng ký, bạn đồng ý với <a href="#" style="text-decoration: none;color:#6f6f7b; font-weight:500">Điều khoản</a>, <a href="#" style="text-decoration: none;color:#6f6f7b; font-weight:500">Chính sách dữ liệu</a> và <a href="#" style="text-decoration: none;color:#6f6f7b; font-weight:500">Chính sách cookie</a> của chúng tôi.</p>
                <div class="container auth-more">
                    <p>Hoặc</p>
                </div>
                <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="padding-left:0; margin-bottom:0">
                            @foreach ($errors->all() as $error)
                            <li style="list-style: none;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <p class="auth-redirect" style="margin-bottom: 30px;">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng nhập</a></p>

            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection

@section('footer')
<div>footer</div>
@endsection
