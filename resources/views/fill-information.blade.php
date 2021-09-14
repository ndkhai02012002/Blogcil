<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blogcil</title>

    <!-- Css -->
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{mix('js/app.js')}}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/e322911a08.js" crossorigin="anonymous"></script>
    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>

<body>


    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="auth-div">
                        <h1>Blogcil</h1>
                        <form class="auth-form" method="POST" action="{{route('fill-finish')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="auth-form-group row">
                                <input type="file" name="avatar" style="border:none" onchange="readURL(this,'#div-image-title','#image_title');">
                            </div>
                            <div class="auth-div" id="div-image-title" style="padding: 20px 20px; border-radius: 15px; margin:0 10px"><img id="image_title" alt="Ảnh tiêu đề" /></div>
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
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <script>
            function readURL(input, div, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(div).css('display', 'block');
                        $(id).css('display', 'block')
                            .attr('src', e.target.result)

                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
</body>

</html>
