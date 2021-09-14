@extends('templates.main')

@section('content')

<div class="container-fluid">
    <div class="container-fluid">
        <div class="row mt-2" style="width:100%">


            <div class="col-md-4">
                <div class="auth-div" style="padding: 20px 0; border-radius: 15px; margin-bottom:20px">
                    <h5 style="font-weight: 600; font-family: 'Sofia', sans-serif;">Chọn ảnh tiêu đề và đặt tiêu đề cho Blog</h5>
                    <form action="{{route('blogs.store')}}" method="POST" id="form-add-blog" style="width: 100%;" enctype="multipart/form-data">
                        @csrf
                        <div class="auth-form-group row" style="margin: auto;">
                            <input type="file" name="image_title" onchange="readURL(this,'#div-image-title','#image_title');">

                        </div>
                        <div class="auth-form-group row" style="margin: auto; margin-top:10px">
                            <input type="text" name="title" placeholder="Tiêu đề blog">
                        </div>
                        <div class="auth-form-group row" style="display:none">
                            <input type="text" name="element_blog" id="element_blog">
                        </div>
                    </form>

                </div>
                <div class="auth-div" id="div-image-title" style="padding: 20px 20px; border-radius: 15px;"><img id="image_title" alt="Ảnh tiêu đề" /></div>
            </div>


            <div class="col-md-6">
                <div id="add-content-blog">

                </div>

            </div>



            <div class="col-md-2 mt-5" style="display: block; text-align: center;">
                <div style=" height:100px">
                    <h6 style="font-weight: 600; font-family: 'Sofia', sans-serif;">Thêm chú thích</h6>
                    <button class="nav-infor" style="margin: 0;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);"><i class="fas fa-images" data-toggle="modal" data-target="#myModal2"></i></button>
                    <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="auth-div" style="padding: 20px 0; border-radius: 15px;">
                                        <h5 style="font-weight: 600; font-family: 'Sofia', sans-serif;">Chú thích</h5>
                                        <div class="auth-form-group row">
                                            <input type="text" id="note_image" name="blog_image_title" placeholder="Chú thích">
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


                                    </div>
                                    <button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right" onclick="addImage($('#note_image').val())">Thêm</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div style="height:100px">
                    <h6 style="font-weight: 600; font-family: 'Sofia', sans-serif;">Thêm văn bản</h6>
                    <button class="nav-infor" style="margin: 0;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);"><i class="fas fa-file-alt" data-toggle="modal" data-target="#myModal3"></i></button>
                    <div class="modal fade" id="myModal3" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="auth-div" style="padding: 20px 0; border-radius: 15px; height:180px">
                                        <h5 style="font-weight: 600; font-family: 'Sofia', sans-serif;">Thêm văn bản</h5>
                                        <div class="auth-form-group" style="width:100%;padding:0 20px">
                                            <textarea class="form-control" style="padding: 5px;" id="blog_content" placeholder="Hãy viết gì đó.." name="blog_content" rows="4"></textarea>
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
                                    </div>
                                    <button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right" onclick="addText($('#blog_content').val())">Thêm</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="height:100px">
                    <h6 style="font-weight: 600; font-family: 'Sofia', sans-serif;">Thêm phần mục</h6>
                    <button class="nav-infor" style="margin: 0;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);"><i class="fas fa-file-alt" data-toggle="modal" data-target="#myModal4"></i></button>
                    <div class="modal fade" id="myModal4" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="auth-div" style="padding: 20px 0; border-radius: 15px; height:180px">
                                        <h5 style="font-weight: 600; font-family: 'Sofia', sans-serif;">Thêm phần mục</h5>
                                        <div class="auth-form-group row">
                                            <input type="text" name="part_blog" id="part_blog" placeholder="Phần mới">
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
                                    </div>
                                    <button class="btn btn-primary" type="submit" style="margin-top: 10px; float:right" onclick="addPart($('#part_blog').val())">Thêm</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="height:100px; margin-top:50px">
                    <h6 style="font-weight: 600; font-family: 'Sofia', sans-serif;">Hoàn tất</h6>
                    <button type="submit" form="form-add-blog" onclick="checkblog($('#add-content-blog').html())" class="nav-infor" style="margin: 0;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);"><i class="fas fa-check" ></i></button>

                </div>

            </div>
        </div>
        <script>
            function checkblog(content) {
                $('#element_blog').val(content);
            }

            function addPart(part) {
                var h3 = document.createElement("h3");
                h3.innerHTML = part;
                $('#add-content-blog').append(h3);
            }

            function addText(text) {
                var p = document.createElement("p");
                p.innerHTML = text;
                $('#add-content-blog').append(p);
            }

            function addImage( note) {
                var i = document.createElement('i');
                i.innerHTML = note;
                $('#add-content-blog').append(i);
            }
        </script>
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
    </div>
    @endsection


