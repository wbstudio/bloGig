<div id="pick_up">
    <h3>おすすめ記事</h3>
    <div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                    <div class="swiper-slide_inner">
                        <a href="">
                            {{--@if(isset($pickup->eyecatch))
                                <img src="{{ asset('asset('storage/eyecatch/' . $pickup->eyecatch) }}" class="">
                            @else--}}
                                <img src="{{ asset('storage/eyecatch/no_image.png') }}" class="">
                                {{--@endif--}}
                            <div class="title">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                        </a>
                        <div class="auther"><span>著者:</span><a href="">KK-suke</a></div>
                        <div class="category"><span>カテゴリー:</span><a href="">競馬・競馬</a></div>
                        <div class="update_date">更新日:2020/03/07</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide_inner">
                        <a href="">
                            {{--@if(isset($pickup->eyecatch))
                                <img src="{{ asset('asset('storage/eyecatch/' . $pickup->eyecatch) }}" class="">
                            @else--}}
                                <img src="{{ asset('storage/eyecatch/no_image.png') }}" class="">
                                {{--@endif--}}
                            <div class="title">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                        </a>
                        <div class="auther"><span>著者:</span><a href="">KK-suke</a></div>
                        <div class="category"><span>カテゴリー:</span><a href="">競馬・競馬</a></div>
                        <div class="update_date"><span>更新日:2020/03/07</span></div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide_inner">
                        <a href="">
                            {{--@if(isset($pickup->eyecatch))
                                <img src="{{ asset('asset('storage/eyecatch/' . $pickup->eyecatch) }}" class="">
                            @else--}}
                                <img src="{{ asset('storage/eyecatch/no_image.png') }}" class="">
                                {{--@endif--}}
                            <div class="title">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                        </a>
                        <div class="auther"><span>著者:</span><a href="">KK-suke</a></div>
                        <div class="category"><span>カテゴリー:</span><a href="">競馬・競馬</a></div>
                        <div class="update_date">更新日:2020/03/07</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide_inner">
                        <a href="">
                            {{--@if(isset($pickup->eyecatch))
                                <img src="{{ asset('asset('storage/eyecatch/' . $pickup->eyecatch) }}" class="">
                            @else--}}
                                <img src="{{ asset('storage/eyecatch/no_image.png') }}" class="">
                                {{--@endif--}}
                            <div class="title">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                        </a>
                        <div class="auther"><span>著者:</span><a href="">KK-suke</a></div>
                        <div class="category"><span>カテゴリー:</span><a href="">競馬・競馬</a></div>
                        <div class="update_date">更新日:2020/03/07</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide_inner">
                        <a href="">
                            {{--@if(isset($pickup->eyecatch))
                                <img src="{{ asset('asset('storage/eyecatch/' . $pickup->eyecatch) }}" class="">
                            @else--}}
                                <img src="{{ asset('storage/eyecatch/no_image.png') }}" class="">
                                {{--@endif--}}
                            <div class="title">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                        </a>
                        <div class="auther"><span>著者:</span><a href="">KK-suke</a></div>
                        <div class="category"><span>カテゴリー:</span><a href="">競馬・競馬</a></div>
                        <div class="update_date">更新日:2020/03/07</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide_inner">
                        <a href="">
                            {{--@if(isset($pickup->eyecatch))
                                <img src="{{ asset('asset('storage/eyecatch/' . $pickup->eyecatch) }}" class="">
                            @else--}}
                                <img src="{{ asset('storage/eyecatch/no_image.png') }}" class="">
                                {{--@endif--}}
                            <div class="title">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                        </a>
                        <div class="auther"><span>著者:</span><a href="">KK-suke</a></div>
                        <div class="category"><span>カテゴリー:</span><a href="">競馬・競馬</a></div>
                        <div class="update_date">更新日:2020/03/07</div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="swiper-slide_inner">
                        <a href="">
                            {{--@if(isset($pickup->eyecatch))
                                <img src="{{ asset('asset('storage/eyecatch/' . $pickup->eyecatch) }}" class="">
                            @else--}}
                                <img src="{{ asset('storage/eyecatch/no_image.png') }}" class="">
                                {{--@endif--}}
                            <div class="title">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
                        </a>
                        <div class="auther"><span>著者:</span><a href="">KK-suke</a></div>
                        <div class="category"><span>カテゴリー:</span><a href="">競馬・競馬</a></div>
                        <div class="update_date">更新日:2020/03/07</div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <script>
            const mySwiper = new Swiper('.swiper-container', {
                // loop: true,
                slidesPerView:3,
                breakpoints: {
                    1023: {
                    slidesPerView: 4,
                    },
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            })
        </script>
    </div>
</div>
