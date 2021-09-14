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
    <script src="{{asset('js/dropdownInfor.js')}}" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/e322911a08.js" crossorigin="anonymous"></script>
    <!-- Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
</head>

<body>
    <div>
        @if (Route::has('login'))
        <div>
            @auth
            <nav class="container-fluid" style="padding: 0;">
                <div class="nav">
                    <a href="/" style="text-decoration: none;">
                        <div class="nav-logo">
                            <img src="/images/logo.png" alt="logo" class="logo" />
                            <p class="logo-text">Blogcil</p>
                        </div>
                    </a>
                    <div class="nav-left"></div>
                    <div class="nav-search" id="search">
                        <div id="search"></div>
                        <div id="list-search"></div>
                    </div>
                    <div class="nav-right">



                        <div id="notice">



                        </div>
                        <button class="nav-infor" id="nav-infor" onclick="dropdownInfor()"> &#9660;

                        </button>
                        <ul class="dropdown-infor" id="dropdown-infor">
                            <li class="dropdown-infor-item" style="border-bottom: 1px solid">
                                <a href="{{route('show-profile')}}" style="text-decoration: none;">
                                    <div class="card-avatar" style="padding:0 ">
                                        <div class="card-avatar-left" style="flex: 15%; height:50px;">
                                            <img src="{{asset('images')}}/{{$avatar}}" alt="Avatar" style="width: 50px; height:50px" />
                                        </div>
                                        <div class="card-avatar-right" style="flex: 85%; height:50px; padding:0">
                                            <h6 style="font-size: 15px;">{{$name}}</h6>
                                            <p style="font-size: 20px; font-weight:600">
                                                Thông tin cá nhân
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-infor-item">
                                <div style="background-color: #616161; margin-right:10px; border-radius:50%;width:36px;height:36px; display:flex;float:left ;justify-content:center;align-items:center"><i class="fas fa-comment-medical"></i></div> Đóng góp ý kiến
                            </li>
                            <li class="dropdown-infor-item">
                                <div style="background-color: #616161; margin-right:10px; border-radius:50%;width:36px;height:36px; display:flex;float:left ;justify-content:center;align-items:center"><i class="fas fa-cog"></i></div> Cài đặt &#38; quyền riêng tư
                            </li>
                            <li class="dropdown-infor-item">
                                <div style="background-color: #616161; margin-right:10px; border-radius:50%;width:36px;height:36px; display:flex;float:left ;justify-content:center;align-items:center"><i class="fas fa-question-circle"></i></div> Trợ giúp &#38; hỗ trợ
                            </li>
                            <li class="dropdown-infor-item">
                                <div style="background-color: #616161; margin-right:10px; border-radius:50%;width:36px;height:36px; display:flex;float:left ;justify-content:center;align-items:center"><i class="fas fa-info-circle"></i> </div>Thông tin ứng dụng
                            </li>
                            <li class="dropdown-infor-item">
                                <div style="background-color: #616161; margin-right:10px; border-radius:50%;width:36px;height:36px; display:flex;float:left ;justify-content:center;align-items:center"><i class="fas fa-sign-out-alt"></i></div>
                                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color:#c4cbce">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </div>
                </div>
                <div id="nav-m">

                </div>
            </nav>
            @else

            @endauth
        </div>
        @endif
    </div>

    <div>
        <div class="loader-wrapper">

        </div>
        @yield('content')
    </div>

    <footer>
    <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->

            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
              <div class="container text-center text-md-start mt-5">
                <!-- Grid row --> <section
              class="d-flex justify-content-center justify-content-lg-between p-4 border-top border-bottom"
            >
              <!-- Left -->
              <div class="me-5 d-none d-lg-block">
                <span>Kết nối mạng xã hội với chúng tôi:</span>
              </div>
              <!-- Left -->

              <!-- Right -->
              <div>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                  <i class="fab fa-github"></i>
                </a>
              </div>
              <!-- Right -->
            </section>
                <div class="row mt-3">
                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      <i class="fas fa-gem me-3"></i>Sản Phẩm
                    </h6>
                    <p>
                      Blogcil
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Chính sách
                    </h6>
                    <p>
                      <a href="#!" class="text-reset">Bảo mật</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Quyền riêng tư</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Điều khoản</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Xem thêm</a>
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Về chúng tôi
                    </h6>
                    <p>
                      <a href="#!" class="text-reset">Giới thiệu</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Thông tin</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Yêu cầu</a>
                    </p>
                    <p>
                      <a href="#!" class="text-reset">Trợ giúp</a>
                    </p>
                  </div>
                  <!-- Grid column -->

                  <!-- Grid column -->
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                      Liên lạc
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Hà Nội, Việt Nam</p>
                    <p>
                      <i class="fas fa-envelope me-3"></i>
                      kkhaisama@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                  </div>
                  <!-- Grid column -->
                </div>
                <!-- Grid row -->
              </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
              © 2021 Blogcil:
              <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Blogcil.com</a>
            </div>
            <!-- Copyright -->
          </footer>
          <!-- Footer -->
    </footer>
    <script>
        $(".content").hide();
        $(window).on("load", function() {

            setTimeout(() => {
                $(".loader-wrapper").fadeOut("slow");
                $(".content").show();
            }, 100);

        });

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
