@extends('templates.main')

@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="auth-div">
                <h1>Blogcil</h1>
                <form class="auth-form" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="auth-form-group row">
                        <input type="email" placeholder="Email hoặc tên tài khoản" name="email">
                    </div>
                    <div class="auth-form-group row">
                        <input type="password" placeholder="Mật khẩu" name="password">
                    </div>
                    <button class="btn auth-form-button" type="submit">Đăng nhập</button>
                </form>
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
                <p class="auth-redirect">Bạn chưa có tài khoản? <a href="{{route('register')}}">Đăng ký</a></p>
                <a href="#" style="text-decoration:none; color:#4a7196; margin-bottom:30px">Quên mật khẩu?</a>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection

@section('footer')
<div>footer</div>
@endsection


