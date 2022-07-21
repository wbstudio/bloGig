<div class="header_upside">
    <div class="header_title_area">
        <a href="{{ route('front.topPage') }}">
            <img src="{{ mix('img/front/pc/logo_test.png') }}">
        </a>
    </div>
    <div class="header_btn_area">
        <form method="POST" action="{{ route('front.article.keyword') }}">
        @csrf
            <input type="text" name="search">
            <input type="image" class="search" src="{{ mix('img/front/pc/icon_search_button.svg') }}">
        </form>
        <!-- @auth
            <a href="{{ route('member.index') }}" class="login">会員ページ</a>
        @else
            <a href="{{ route('login') }}" class="login">ログイン</a>
            <a href="{{ route('register') }}" class="regist_member">新規登録</a>
        @endauth -->
    </div>
</div>
<div class="header_downside">
    <!--8つまでこのCSSでいけるはず-->
    <ul class="header_downside_list">
        <li class="header_downside_mass has-sub">
            <a href="">ブロガー</a>
            <ul class="sub narrow">
                @foreach($autherList as $key => $autherData)
                <li><a href="">{{ $autherData->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="header_downside_mass has-sub">
            <a href="">カテゴリー</a>
            <ul class="sub">
                @foreach($categoryList as $key => $categoryData)
                <li><a href="">{{ $categoryData->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="header_downside_mass no-sub">
            <a href="">おススメ記事</a>
        </li>
        <li class="header_downside_mass no-sub">
            <a href="">お問い合わせ</a>
        </li>
        <li class="header_downside_mass no-sub">
            <a href="">使い方</a>
        </li>
        <li class="header_downside_mass no-sub">
            <a href="">このブログは...</a>
        </li>
    </ul>
</div>
