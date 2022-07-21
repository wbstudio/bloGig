@extends('front.pc.particle.layout')
@section('title') bloGig-の記事一覧@endsection
@section('css')
    <link rel="stylesheet" href="{{ mix('css/front/pc/article.css') }}">
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <div id="article_detail" class="">
        <h2 class="article_title">{{ $articleData->title }}</h2>
        <section id="article_area">
            <div class="article_setting">
                <table class="article_setting_table">
                    <tr>
                        <td class="article_auther"><span class="title">筆者:</span>{{ $articleData->auther_name }}</td>
                        <td class="article_date"><span class="title">更新日時:</span>{{ Common::dateConverter($articleData->updated_at) }}</td>
                    </tr>
                    <tr>
                        <td class="article_category"><span class="title">カテゴリー:</span>{{ $articleData->category_name }}</td>
                        <td class="article_count"><span class="title">閲覧数:</span>{{ $articleData->count }}</td>
                    </tr>
                </table>
                <div class="article_tags">
                    @isset ($tagsList)
                        @foreach ($tagsList as $tagdata)
                            <a href=""><div class="tag_single">{{ $tagdata->name }}</div></a>
                        @endforeach
                    @endisset
                </div>
            </div>
            <div class="main">
                {!! $articleData->main !!}
            </div>
        </section>

        <div class="section_separation"></div>

        <section id="recommend">
            {{--@if(isset($pickupList) && is_countable($pickupList))--}}
                @include('front.pc.particle.pickUp')
            {{--@endif--}}
        </section>

        <div class="section_separation"></div>

    </div>
</div>
@endsection

