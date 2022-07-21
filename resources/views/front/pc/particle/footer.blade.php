<div class="footter_iiner">
    <div class="site_title_area">
        <a href="">
            <img src="{{ mix('img/front/pc/logo03_02.png') }}">
        </a>
    </div>
    <div class="site_contents_area">
        <div class="site_contents_blog">
        <h3>Blogger</h3>
            <div class="footer_blog_area">

                @foreach($autherList as $key => $autherData)
                <div class="blog_auther">
                    <h4><a href="">{{ $autherData->name }}</a></h4>
                </div>
                @endforeach

            </div>
            <h3>Category</h3>
            <div class="footer_blog_area">
                @foreach($categoryList as $key => $categoryData)
                <div class="blog_category">
                    <h4><a href="">{{ $categoryData->name }}</a></h4>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="anothersite_link_area">
        <div class="snslink_area">
            <a href=""><img src="{{ mix('img/front/pc/Facebook_black.svg') }}"></a>
            <a href=""><img src="{{ mix('img/front/pc/Instagram_black.svg') }}"></a>
            <a href=""><img src="{{ mix('img/front/pc/Twitter_black.svg') }}"></a>
            <a href=""><img src="{{ mix('img/front/pc/Youtube_black.svg') }}"></a>
            <div class="cheer">
                bloGig公式SNSもやっています。<br>
                フォロー・チャンネル登録等よろしくお願いします。
            </div>
        </div>
        <div class="wblink_area">
            <a href=""><img src="{{ mix('img/front/pc/logo_test.png') }}"></a>
            <div class="footer_summary">
                <div class="footer_summary_item"><a href="">blog-Hとは？</a></div>
                <div class="footer_summary_item"><a href="">お問い合わせ</a></div>
                <!-- <div class="footer_summary_item"><a href="">運営について</a></div> -->
                <div class="footer_summary_item"><a href="">利用規約</a></div>
                <div class="footer_summary_item"><a href="">プライバシーポリシー</a></div>
            </div>
        </div>
    </div>
</div>
<div class="footer_base">
    &copy; 2022 wb-studio
</div>
