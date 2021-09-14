@extends('templates.main')

@section('content')


@if (Route::has('login'))

@auth
<div class="container-fluid" style="margin-top: 100px;">
    <div class="content">
        <div class="content-left-div"></div>
        <div class="content-left">
            <ul class="list-group">
                <li class="list-group-item list-group-item-left">
                    <div class="card-user">
                        <img src="{{asset('images')}}/{{$avatar}}" alt="avatar" class="avatar" />
                        <p>{{$name}}</p>
                    </div>
                </li>
                <div id="content-left">
                    <li class="list-group-item-left list-group-item"><a href="/">
                            <div class="row">

                                <div class="col-2">
                                    <i class="fas fa-clipboard" style="color:aqua"></i>
                                </div>
                                <div class="col-6">
                                    <h6>Bài viết</h6>
                                </div>


                            </div>
                        </a>
                    </li>
                    <li class="list-group-item-left list-group-item"> <a href="{{route('blogs')}}">
                            <div class="row">

                                <div class="col-2">
                                    <i class="fas fa-blog" style="color:#13b9b3"></i>
                                </div>
                                <div class="col-6">
                                    <h6>Blog</h6>
                                </div>

                            </div>
                        </a>
                    </li>
                    <li class="list-group-item-left list-group-item">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-save"></i>
                            </div>
                            <div class="col-6">
                                <h6>Đã lưu</h6>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item-left list-group-item">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-history"></i>
                            </div>
                            <div class="col-6">
                                <h6>Kỷ niệm</h6>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item-left list-group-item">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="col-6">
                                <h6>Sự kiện</h6>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item-left list-group-item">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-star" style="margin-left: 22px;"></i>
                            </div>
                            <div class="col-6">
                                <h6>Yêu thích</h6>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>

        <div class="content-center">
            <div class="add-content">
                <div class="border-bottom" style="height:50px ">
                    <li>
                        <img src="{{asset('images')}}/{{$avatar}}" alt="Avatar13" class="avatar" />
                    </li>
                    <li class="add-content-title">
                        <p>Hãy sáng tạo theo phong cách của bạn...</p>
                    </li>
                </div>
                <div class="row mt-2" style="
                        display: flex;
                        align-content: center;
                        justify-content: space-between;
                    ">
                    <div class="col-md-4" style="display: flex; justify-content: center ">
                        <a href="{{route('add-blog')}}" style="text-decoration: none;"><button class="btn btn-primary btn-add-content1">
                                <i class="fas fa-blog"></i>
                                <p style="margin-bottom: 0 ">Tạo mới Blog</p>
                            </button>
                        </a>


                    </div>
                    <div class="col-md-4" style="display: flex; justify-content: center">
                        <button class="btn btn-primary btn-add-content2" data-toggle="modal" data-target="#myModal">
                            <i class="fas fa-clipboard"></i>
                            <p style="margin-bottom: 0 ">Tạo bài viết</p>
                        </button>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-row" style="display: flex; justify-content:center">
                                                <h6>Chọn ảnh cho bài viết</h6>
                                                <div class="mb-3" style="flex:100%">
                                                    <input type="file" name="image_title" onchange="readURL(this,'#div-image-titlen','#image_titlen');"></input>
<div class="auth-div" id="div-image-titlen" style="width:90%; padding: 20px 20px; border-radius: 15px; margin:10px 10px"><img style="width:95%" id="image_titlen" alt="Ảnh tiêu đề" /></div>
                                                </div>

                                                <div style="flex:100%">
                                                    <div class="form-outline">
                                                        <textarea class="form-control" id="textAreaExample2" placeholder="Hãy viết gì đó.." name="title" rows="4"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right">Đăng bài viết</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="display: flex; justify-content: center ">
                        <button class="btn btn-primary btn-add-content3">
                            <i class="fas fa-plus-circle"></i>
                            <p style="margin-bottom: 0 ">Tạo mới Khác</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="loader-wrapper">

        </div>
            <div id="list-post" onload="onloadPost()"></div>
        </div>
        <div class="content-right-div"></div>
        <div class="content-right">
            <ul class="list-group">
                <li class="list-group-item list-group-item-right">
                    <div class="row">
                        <div class="col-8">
                            <h5>Gợi ý cho bạn</h5>
                        </div>
                        <div class="col-4">
                            <a href="{{route('suggestions')}}" style=" font-size: 12px;
                                    font-weight: 600;
                                    margin-top: 5px;
                                    text-decoration:none">
                                Xem tất cả
                            </a>
                        </div>
                    </div>
                </li>
                <div id="content-right"></div>
            </ul>
        </div>
    </div>
</div>
@else
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

@endauth

@endif



@endsection


