<div id=side_navi class="content">
    <div class="side_news">
        <div class="side_title">News</div>
        <ul>
        <li>
            <a href="">
                    <span class="side_navi_date">
                        2022/01/01
                    </span>
                    <p title="" class="side_navi_title">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                    </p>
                </a>
                <div class="side_navi_auther">
                    <span>筆者:</span>
                    筆者テスト0001
                </div>
                <div class="side_navi_category">
                    <span>カテゴリー:</span>
                    カテゴリーテスト
                </div>
            </li>
            <li>
                <a href="">
                    <span class="side_navi_date">
                        2022/01/01
                    </span>
                    <p title="" class="side_navi_title">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                    </p>
                </a>
                <div class="side_navi_auther">
                    <span>筆者:</span>
                    筆者テスト0001
                </div>
                <div class="side_navi_category">
                    <span>カテゴリー:</span>
                    カテゴリーテスト
                </div>
            </li>
            <li>
                <a href="">
                    <span class="side_navi_date">
                        2022/01/01
                    </span>
                    <p title="" class="side_navi_title">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                    </p>
                </a>
                <div class="side_navi_auther">
                    <span>筆者:</span>
                    筆者テスト0001
                </div>
                <div class="side_navi_category">
                    <span>カテゴリー:</span>
                    カテゴリーテスト
                </div>
            </li>
            <li>
                <a href="">
                    <span class="side_navi_date">
                        2022/01/01
                    </span>
                    <p title="" class="side_navi_title">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                    </p>
                </a>
                <div class="side_navi_auther">
                    <span>筆者:</span>
                    筆者テスト0001
                </div>
                <div class="side_navi_category">
                    <span>カテゴリー:</span>
                    カテゴリーテスト
                </div>
            </li>
            <li>
                <a href="">
                    <span class="side_navi_date">
                        2022/01/01
                    </span>
                    <p title="" class="side_navi_title">
                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                    </p>
                </a>
                <div class="side_navi_auther">
                    <span>筆者:</span>
                    筆者テスト0001
                </div>
                <div class="side_navi_category">
                    <span>カテゴリー:</span>
                    カテゴリーテスト
                </div>
            </li>
        </ul>
    </div>
    @if(isset($newArticlesList) && is_countable($newArticlesList))
    <div class="side_recently">
        <div class="side_title">Update</div>
        <ul>
            @foreach($newArticlesList as $index => $newArticle)
            <li>
                <a href="{{ route('detail.article', ['article_id' => $newArticle->id]) }}">
                    <span class="side_navi_date">
                        {{ $newArticle->release_at->format('Y/m/d') }}
                        @if($newArticle->release_at > $threeDaysAgo)
                        <img src="{{ asset('images/front/icon_new.png') }}" width="34px">
                        @endif
                    </span>
                    <p title="{{$newArticle->title}}" class="side_navi_title">
                        {{$newArticle->title}}
                    </p>
                </a>
                <div class="side_navi_auther">
                    <span>筆者:</span>
                    <a href="{{ route('list.onlyAuther', ['auther_id' => $newArticle->auther]) }}">{{config("auther.$newArticle->auther.name")}}</a>
                </div>
                <div class="side_navi_category">
                    <span>カテゴリー:</span>
                    <a href="{{ route('list.bothAutherAndCategory', ['auther_id' => $newArticle->auther,'category_id' => $newArticle->auther_category,'page'=>1]) }}">{{config("auther.$newArticle->auther.category.$newArticle->auther_category.name")}}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(isset($rankingList) && is_countable($rankingList))
    <div class="side_ranking">
        <div class="side_title">Ranking</div>
        <ul>
            @foreach($rankingList as $index => $ranking)
            <li>
                <a href="{{ route('detail.article', ['article_id' => $ranking->id]) }}">
                    @if($index < 3)
                    <img src="{{ asset('images/front/icon_rank'.$index.'.png') }}" style="vertical-align: bottom;width:30px;">
                    @elseif($index == 3)
                    <span class="ranking">4位</span>
                    @else
                    <span class="ranking">5位</span>
                    @endif
                    <span class="side_navi_date">
                        {{ $ranking->release_at->format('Y/m/d') }}
                    </span>
                    <p title="{{$ranking->title}}" class="side_navi_title">
                        {{$ranking->title}}
                    </p>
                </a>
                <div class="side_navi_auther">
                    <span>筆者:</span>
                    <a href="{{ route('list.onlyAuther', ['auther_id' => $ranking->auther]) }}">{{config("auther.$ranking->auther.name")}}</a>
                </div>
                <div class="side_navi_category">
                    <span>カテゴリー:</span>
                    <a href="{{ route('list.bothAutherAndCategory', ['auther_id' => $ranking->auther,'category_id' => $ranking->auther_category,'page'=>1]) }}">{{config("auther.$ranking->auther.category.$ranking->auther_category.name")}}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
