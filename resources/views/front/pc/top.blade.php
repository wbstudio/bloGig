@extends('front.pc.particle.layout')
@section('title', 'bloGig Top Page')
@section('css')
    <link rel="stylesheet" href="{{ mix('css/front/pc/top.css') }}">
@endsection
@section('js')
@endsection

@section('content')
<div class="container">
    <div id="top_page" class="">
        <section id="blogger">
            <h2>ブロガー</h2>
            @foreach ($autherList as $key => $autherData)
                <div class="fadeUpTrigger @if ($loop->index%2 != 0) blogger_even @else blogger_odd @endif">
                    @if (!empty($autherData->image))
                        <img src="{{ asset('storage/profile/'. $autherData->image) }}" class="">
                    @else
                        <img src="{{ mix('img/front/pc/face_test.png') }}" class="">
                    @endif
                    <div class="blogger_name">
                        {{ $autherData->name }}
                    </div>
                    <div class="blogger_explain">
                        <div class="blogger_explain_title">profile</div>
                        <p class="blogger_explain_detail">{!! nl2br(e($autherData->explain)) !!}</p>
                    </div>
                    <div class="to_blogger_category">
                        <a href="{{ route('front.auther.detail', ['auther_id' => $autherData->id]) }}">{{ $autherData->name }}の部屋へ</a>
                    </div>
                </div>
            @endforeach
        </section>

        <div class="section_separation"></div>

        <section id="category">
            <h2>カテゴリー</h2>
            <div class="category">
                <table class="category_table">
                    @foreach ($categoryList as $index => $categoryData)
                        @if ($loop->index % 4 == 0)
                            <tr class="fadeUpTrigger">
                        @endif
                            <td>
                                <a href="">
                                    ・{{ $categoryData->name }}                        
                                </a>
                            </td>
                        @if ($loop->index % 4 == 3 || $loop->last)
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </section>

        <div class="section_separation"></div>

        <section id="this_blog_is">
            <h2 class="ja">bloGigの理念</h2>
            <div class="fadeUpTrigger">
                <p>
                    bloGigの理念というか、思いを記してみました。<br>
                    ヘッダーに書いてある<br>
                    <span class="big_font">「</span><span class="red big_font">偏愛</span><span class="big_font">」</span><br>
                    <span class="big_font">「</span><span class="red big_font">大きな興味</span><span class="big_font">と</span><span class="red big_font">小さな違和感</span><span class="big_font">」</span><br>
                    とは何なのかも記してみました。<br>
                    ぜひ、読んでみてください。
                </p>
                <div class="to_link_tbi">
                    <a href="">「bloGigとは？」へ</a>
                </div>
            </div>
        </section>

        <div class="section_separation"></div>

        <section id="how_to">
            <h2>How to use<span>(使い方)</span></h2>
            <div class="fadeUpTrigger">
                <p>
                    bloGigの簡単な使い方をまとめてみました。<br>
                    主に以下の3つについて書いてあります。<br>
                    参考にしてみてください。
                </p>
                <ul>
                    <li>blogの記事の選択の仕方</li>
                    <li>お問い合わせの仕方</li>
                </ul>
                <div class="to_link_tbi">
                    <a href="">「How to use(使い方)」のページへ</a>
                </div>
            </div>
        </section>

        <div class="section_separation"></div>

        <section id="inquiry">
            <h2 class="ja">Contact<span>(お問い合わせ)</span></h2>
            <div class="fadeUpTrigger">
                <p>
                    「偏愛」を持つ者同士多くを語り合えたら嬉しいと思っていますので、<br>
                    <span class="red big_font">お友達にLINEするくらい気軽にお問い合わせ</span>してください。<br>
                </p>
                <div class="to_link_con">
                    <a href="">「Contact(お問い合わせ)」のページへ</a>
                </div>
            </div>
        </section>

        <div class="section_separation"></div>

    </div>
</div>

@endsection