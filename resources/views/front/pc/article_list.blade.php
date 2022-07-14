@extends('front.pc.particle.layout')
@section('title') bloGig-の記事一覧@endsection
@section('css')
    <link rel="stylesheet" href="{{ mix('css/front/pc/article.css') }}">
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <div id="article_list" class="">
        <h2 class="list_title">「<span class=""></span>」の記事一覧</h2>
        <div class="list_area">
            @for ($i = 0; $i < 20; $i++)
                <div class="article_list_mass fadeUpTrigger">
                    <div class="article_list_image_area">
                        <a href="{{ route('front.article.detail', ['article_id' => 4]) }}">
                            <img src="{{ mix('img/front/pc/no_image.png')}}" class="">
                        </a>
                        <div class="article_list_base">
                            <div class="article_list_auther">著者:<a href="">testtesttest</a></div>
                            <div class="article_list_category">カテゴリー:<a href="">testtesttest</a></div>
                            <div class="article_list_update">更新日時:0000/00/00</div>
                        </div>
                    </div>
                    <div class="article_list_explain_area">
                        <div class="article_list_title"><a href="">あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</a></div>
                        <div class="article_list_explain"> <a href="">あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</a> </div>
                        <div class="article_list_tag_list">
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                            <a href=""><div class="tag_single">aaaaaaaaaaaaaaaaaa</div></a>
                        </div>
                        <div class="article_list_view_count">閲覧数:00000</div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>
@endsection