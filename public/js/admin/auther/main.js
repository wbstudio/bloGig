$(function () {
  $(".submit_place .delete_button").click(function () {
    var result = confirm('checkしたものを削除しますか？');

    if (!result) {
      return false;
    }
  }); //プロフィール画像--upload

  $('#profile').change(function (e) {
    //ファイルオブジェクトを取得する
    var file = e.target.files[0];
    var reader = new FileReader();
    console.log(file); //画像でない場合は処理終了

    if (file.type.indexOf("image") < 0) {
      alert("画像ファイルを指定してください。");
      return false;
    } //アップロードした画像を設定する


    reader.onload = function (file) {
      return function (e) {
        $("#sumb").attr("src", e.target.result);
        $("#sumb").attr("title", file.name);
        $("#sumb").css('display', 'block');
        $('.img_name').text(file.name);
      };
    }(file);

    reader.readAsDataURL(file);
  }); //プロフィール画像--onload

  if ($('input#profile_old').val() != '') {
    var displayFileName = $('input#profile_old').val();
    $("#sumb").attr("src", location.protocol + '//' + location.host + '/storage/profile/' + displayFileName);
    $("#sumb").attr("title", displayFileName);
    $("#sumb").css('display', 'block');
    $('.img_name').text(displayFileName);
  }
});
