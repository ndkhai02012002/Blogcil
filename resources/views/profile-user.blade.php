@extends('templates.main')

@section('content')
<div class="profile">
    <div class="information">
        <div class="infor-name container">
            <h5>{{$name}}</h5>
            <i class="fas fa-check"></i>
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
                <div class="profile-avatar"><img src="{{asset('images')}}/{{$avatar}}" alt="avatar"></div>
            </div>
            <div class="container-infor-right" id="followbutton" style="display:flex; justify-content:center; align-items:center">

            </div>

        </div>
        <div class="row" style="justify-content: center; display:flex">
            <h5>&#64;{{$infor->nick_name}}</h5>
        </div>
        <div class="user-profile-post">
            <ul>
                <li style="border-bottom: 5px solid #13b9b3;">Bài viết</li>
                <li>Danh sách</li>
                <li>Thông tin</li>
            </ul>
        </div>
    </div>

</div>

</div>
@endsection


