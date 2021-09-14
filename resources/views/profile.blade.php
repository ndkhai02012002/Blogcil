@extends('templates.main')

@section('content')

<div class="profile">
    <div class="information">
        <div class="infor-name container">
            <h5>{{$user->name}}</h5>
            <i class="fas fa-user-edit"></i>
        </div>
        <div class="container-infor">
            <div class="container-infor-left">
                <ul class="follow-and-post">
                    <li><span>{{$infor->post_count}}</span></li>
                    <li>
                        <div>Bài viết</div>
                    </li>
                    <li><span>{{$infor->followers_count}}</span></span></li>
                    <li>
                        <div>Người theo dõi</div>
                    </li>
                    <li><span>{{$infor->follow_to_count}}</span></li>
                    <li>
                        <div>Đang theo dõi</div>
                    </li>
                </ul>
            </div>
            <div class="container-infor-center">
                <div class="profile-avatar"><img src="{{asset('images')}}/{{$infor->avatar}}" alt="avatar"></div>
            </div>
            <div class="container-infor-right" style="display:flex; justify-content:center; align-items:center">
                <button class="btn setting-profile" data-toggle="modal" data-target="#myModal4">Chỉnh sửa <i class="fas fa-user-cog"></i></button>
                <div class="modal fade" id="myModal4" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="auth-div">
                                    <h2 style="margin-top:10px;font-weight:600">Cập nhật thông tin</h2>
                                    <form class="auth-form" method="POST" action="{{route('update-profile')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="auth-form-group row">
                                            <input type="file" name="avatar" style="border:none">
                                        </div>
                                        <div class="auth-form-group row">
                                            <input type="text" name="name" placeholder="Tên của bạn" value="{{old('name')}}">
                                        </div>
                                        <div class="auth-form-group row">
                                            <input type="text" name="nick_name" placeholder="Biệt danh của bạn" value="{{old('nick_name')}}">
                                        </div>
                                        <div class="auth-form-group row">
                                            <input type="text" name="birth_day" placeholder="Năm sinh" value="{{old('birth_day')}}">

                                        </div>
                                        <button class="btn auth-form-button" type="submit">Hoàn tất</button>
                                    </form>
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
                                    <p class="auth-redirect" style="margin-bottom: 30px;">Hoàn thành để cập nhật thông tin cá nhân của bạn</p>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="justify-content: center; display:flex">
            <h5>&#64;{{$infor->nick_name}}</h5>
        </div>
        <div>
            <ul class="profile-post">
                <li style="border-bottom: 5px solid #13b9b3;">Bài viết</li>
                <li>Danh sách</li>
                <li>Đã lưu</li>
                <li>Thông tin</li>
            </ul>
        </div>
    </div>
</div>
@endsection

