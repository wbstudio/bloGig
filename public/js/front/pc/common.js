$(function () {
  //blog部分のimg
  $("#article_detail #article_area .main img").css("height", "auto"); //topのアコーディオン

  $('.has-sub').mouseover(function () {
    //マウスを乗せたときの処理
    $(this).find("ul.sub").stop().slideDown();
  }).mouseout(function () {
    //マウスが外れたときの処理
    $(this).find("ul.sub").stop().slideUp();
  }); //animation

  $(window).scroll(function () {
    fadeAnime();
  });
  $(window).on('load', function () {
    fadeAnime();
  });
});

function fadeAnime() {
  $('.fadeUpTrigger').each(function () {
    var elemPos = $(this).offset().top - 50;
    var scroll = $(window).scrollTop();
    var windowHeight = window.innerHeight;

    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('fadeUp');
    } else {
      $(this).removeClass('fadeUp');
    }
  });
}
