$(function(){
    var pageType = $('input[name=page]').val();
    if (pageType == 'regist'){
        var selectVal = $('table select[name=auther]').val();
        if (selectVal != '') {
            $('table select[name=category]').prop("disabled", true);
        } else {
            $('table select[name=category]').prop("disabled", false);
        }
    
        var selectVal = $('table select[name=category]').val();
        if (selectVal != '') {
            $('table select[name=category]').prop("disabled", true);
        } else {
            $('table select[name=category]').prop("disabled", false);
        }
    
        $('table select[name=auther]').change(function() {
            var selectVal = $(this).val();
            if (selectVal != '') {
                $('table select[name=category]').prop("disabled", true);
            } else {
                $('table select[name=category]').prop("disabled", false);
            }
        });
    
        $('table select[name=category]').change(function() {
            var selectVal = $(this).val();
            if (selectVal != '') {
                $('table select[name=auther]').prop("disabled", true);
            } else {
                $('table select[name=auther]').prop("disabled", false);
            }
        });    
    }

    $('.select_area input[type=submit]').click(function() {
        var result = confirm('選択されている記事は破棄されます。');
        if (!result) {
            return false;
        }
    });

});
