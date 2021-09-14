@extends('templates.main')

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @foreach($blog as $blg)
                <div class="blog-body">
                    <img src="{{asset('images')}}/{{$blg->image_title}}" alt="Ảnh tiêu đề" />
                    <div class="blog-title">{{$blg->title}}</div>
                </div>
                <div id="get-content-blog" style="display: none;">
                    {{$blg->content}}

                </div>
                <div id="add-content-blog"></div>
            </div>
            @endforeach
            <div class="col-md-2"></div>
        </div>
    </div>
        <script>
            $("#add-content-blog").html($("#get-content-blog").text());
                    </script>
</div>

@endsection

