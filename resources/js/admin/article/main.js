$(function() {
    //筆者・カテゴリー
    ajustCategorySelect('initial');

    $("select.auther").change(function() {
        ajustCategorySelect('change')
    });

    //

    //公開・非公開時間
    // 初期表示
    var returnFlg = $("input[name=return_flg]").val(),
        kindFlg = $("input[name=kind_flg]").val(),
        endActiveFlag = $("input[name=endstatus]").prop("checked");
        console.log(endActiveFlag);
    
    //公開開始時刻
    if (returnFlg == 'on' || kindFlg == 'edit') {
        var setRYear = $("input[name=set_rel_year]").val();
        var setRMonth = Number($("input[name=set_rel_month]").val());
        var setRDate = Number($("input[name=set_rel_day]").val());
        var setRHours = Number($("input[name=set_rel_hour]").val());
        var setRMinute = Number($("input[name=set_rel_minute]").val());
    } else {
        var current = new Date();
        var setRYear = current.getFullYear();
        var setRMonth = current.getMonth() + 1;
        var setRDate = current.getDate();
        var setRHours = current.getHours();
        var setRMinute = current.getMinutes();
    }

    //公開終了時刻
    if (!endActiveFlag) {
        var current = new Date();
        var setEYear = current.getFullYear();
        var setEMonth = current.getMonth() + 1;
        var setEDate = current.getDate();
        var setEHours = current.getHours();
        var setEMinute = current.getMinutes();
    } else {
        var setEYear = $("input[name=set_end_year]").val();
        var setEMonth = Number($("input[name=set_end_month]").val());
        var setEDate = Number($("input[name=set_end_day]").val());
        var setEHours = Number($("input[name=set_end_hour]").val());
        var setEMinute = Number($("input[name=set_end_minute]").val());
    }
    console.log(setEYear);
    //公開開始時間SET
    $('select[name=release_year] option[value=' + setRYear + ']').prop('selected', true);
    $('select[name=release_month] option[value=' + setRMonth + ']').prop('selected', true);
    $('select[name=release_hour] option[value=' + setRHours + ']').prop('selected', true);
    $('select[name=release_minute] option[value=' + setRMinute + ']').prop('selected', true);
    setReleaseDay();
    $('select[name=release_day] option[value=' + setRDate + ']').prop('selected', true);
    //公開終了時間SET
    $('select[name=end_year] option[value=' + setEYear + ']').prop('selected', true);
    $('select[name=end_month] option[value=' + setEMonth + ']').prop('selected', true);
    $('select[name=end_hour] option[value=' + setEHours + ']').prop('selected', true);
    $('select[name=end_minute] option[value=' + setEMinute + ']').prop('selected', true);
    setEndDay(endActiveFlag);
    $('select[name=end_day] option[value=' + setEDate + ']').prop('selected', true);

    // 年/月 変更--公開開始
    $('select[name=release_year], select[name=release_month]').change(function() {
        setReleaseDay();
    });
    // 年/月 変更--公開終了
    $('select[name=end_year], select[name=end_month]').change(function() {
        setEndDay(true);
    });
    $("input[name=endstatus]").change(function() {
        if($(this).prop("checked") == true){
            $('select[name=end_year]').prop('disabled', false);
            $('select[name=end_month]').prop('disabled', false);
            $('select[name=end_day]').prop('disabled', false);
            $('select[name=end_hour]').prop('disabled', false);
            $('select[name=end_minute]').prop('disabled', false);
        }else{
            $('select[name=end_year]').prop('disabled', true);
            $('select[name=end_month]').prop('disabled', true);
            $('select[name=end_day]').prop('disabled', true);
            $('select[name=end_hour]').prop('disabled', true);
            $('select[name=end_minute]').prop('disabled', true);
        };
    });

    //プロフィール画像--upload
    $('#eyecatch').change(function(e){
        //ファイルオブジェクトを取得する
        var file = e.target.files[0];
        var reader = new FileReader();
        //画像でない場合は処理終了
        if(file.type.indexOf("image") < 0){
          alert("画像ファイルを指定してください。");
          return false;
        }
     
        //アップロードした画像を設定する
        reader.onload = (function(file){
          return function(e){
            $("#sumb").attr("src", e.target.result);
            $("#sumb").attr("title", file.name);
            $("#sumb").css('display', 'block');
            $('.img_name').text(file.name);
          };
        })(file);
        reader.readAsDataURL(file);
      });
    
    //プロフィール画像--onload
    if ($('input#eyecatch_old').val() != '') {
        var displayFileName = $('input#eyecatch_old').val();
        $("#sumb").attr("src", location.protocol + '//' + location.host + '/storage/eyecatch/' + displayFileName);
        $("#sumb").attr("title", displayFileName);
        $("#sumb").css('display', 'block');
        $('.img_name').text(displayFileName);
    }    
      
});

function ajustCategorySelect(state){
    var auther = $('select.auther').val();
    var autherCategory = $('select.auther option:selected').data('category');
    var autherCategoryArray = [];
    if (String(autherCategory).indexOf("|") !== -1) {
        autherCategoryArray = autherCategory.split('|');
    } else {
        autherCategoryArray.push(String(autherCategory));
    }

    if(auther != "" && autherCategory != ''){
        $("select.category").prop("disabled", false);
        var category = $("select.category option");

        for (var i=0; i<$(category).length; i++) {
            if (i == 0) {
                $(category).eq(i).css("display","block");
            } else {
                if (autherCategoryArray.includes($(category).eq(i).val())) {
                    $(category).eq(i).css("display","block");
                } else {
                    $(category).eq(i).css("display","none");
                }    
            }
        }
    }else{
        $("select.category").prop("disabled", true);
    }
    if (state == 'initial') {
        var initialCategory = $('input.initial_category').val();
        if (initialCategory != undefined) {
            $("select.category").val(initialCategory);
        }
    } else {
        $("select.category").val('');
    }
}

/**
 * 日プルダウンの制御
 */
function setReleaseDay()
{
    yearVal = $('select[name=release_year]').val();
    monthVal = $('select[name=release_month]').val();

    // 指定月の末日
    var t = 31;
    // 2月
    if (monthVal == 2) {
        //　4で割りきれる且つ100で割りきれない年、または400で割り切れる年は閏年
        if (Math.floor(yearVal%4) == 0 && Math.floor(yearVal%100) != 0 || Math.floor(yearVal%400) == 0) {
        t = 29;
        }  else {
        t = 28;
        }
        // 4,6,9,11月
    } else if (monthVal == 4 || monthVal == 6 || monthVal == 9 || monthVal == 11) {
        t = 30;
    }

    // 初期化
    $('select[name=release_day] option').remove();
    for (var i = 1; i <= t; i++){
        $('select[name=release_day]').append('<option value="' + i + '">' + i + '</option>');
    }
}

/**
 * 日プルダウンの制御
 */
function setEndDay(endActiveFlag)
{
    yearVal = $('select[name=end_year]').val();
    monthVal = $('select[name=end_month]').val();

    // 指定月の末日
    var t = 31;
    // 2月
    if (monthVal == 2) {
        //　4で割りきれる且つ100で割りきれない年、または400で割り切れる年は閏年
        if (Math.floor(yearVal%4) == 0 && Math.floor(yearVal%100) != 0 || Math.floor(yearVal%400) == 0) {
        t = 29;
        }  else {
        t = 28;
        }
        // 4,6,9,11月
    } else if (monthVal == 4 || monthVal == 6 || monthVal == 9 || monthVal == 11) {
        t = 30;
    }

    // 初期化
    $('select[name=end_day] option').remove();
    for (var i = 1; i <= t; i++){
        $('select[name=end_day]').append('<option value="' + i + '">' + i + '</option>');
    }

    if (!endActiveFlag) {
        $('select[name=end_year]').prop('disabled', true);
        $('select[name=end_month]').prop('disabled', true);
        $('select[name=end_day]').prop('disabled', true);
        $('select[name=end_hour]').prop('disabled', true);
        $('select[name=end_minute]').prop('disabled', true);
    }
}
