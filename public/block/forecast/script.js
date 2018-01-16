$(document).ready(function () {
    $('.checkbox-imitate').click(function () {
        $('.imitate-check').toggleClass('inactiveCheck');
        if($('.inactiveCheck').length>0){
            $('.subscribe-button').prop('disabled', true);
        } else {
            $('.subscribe-button').prop('disabled', false);
        }
    });



    var forecast = {};

    // радиобаттон на исход матча
    $('.result-box').click(function () {
        $('.result-box').removeAttr('data-select').find('span').removeClass('select-box');
        var $this = $(this);
        $this.attr('data-select','1').find('span').addClass('select-box').parent().parent().find('.lamp').addClass('lamp-confirm');
    });

    // проставление исхода матча при операцией со счетом
    $('.goal-home, .goal-visit').on('change', function () {
        $('.result-box').removeAttr('data-select').find('span').removeClass('select-box');
        $('.goal-home, .goal-visit').parent().find('.lamp').addClass('lamp-confirm');
        var home = forecast.home = Number($('.goal-home').val());
        var visit = forecast.visit = Number($('.goal-visit').val());
        var result = home-visit;
        $('.goals-margin').val(result);
        forecast.margin = result;
        $('.goals-sum').val(home+visit).parent().find('.lamp').addClass('lamp-confirm');
        forecast.sum = home+visit;
        $('.home_win').parent().find('.lamp').addClass('lamp-confirm');
        if (result>0){
            $('.home_win').attr('data-select','1').find('span').addClass('select-box');
        }else if(result<0){
            $('.visit_win').attr('data-select','1').find('span').addClass('select-box');
        }else {
            $('.nobody_win').attr('data-select','1').find('span').addClass('select-box');
        }
    });
    // разница мячей
    $('.goals-margin').on('change', function () {
        $(this).parent().children('.'+$(this).attr('data')+'-title').find('.lamp').addClass('lamp-confirm');
        forecast.margin = $(this).val();
        console.log('margin', forecast);
    });
    // сумма мячей
    $('.goals-sum').on('change', function () {
        $(this).parent().children('.'+$(this).attr('data')+'-title').find('.lamp').addClass('lamp-confirm');
        forecast.sum = $(this).val();
        console.log('margin', forecast);
    });
    // %владения мячом
    $('#possession').on("change", function() {
        var value = forecast.possession = Number(this.value);
        // обработчик прокрутки бегунка
        $('#possession').css({'background':'-webkit-linear-gradient(left ,#8870FF 0%,#8870FF '+value+'%,yellow '+value+'%, yellow 100%)'});

        $('.countTeam1').val(value);
        $('.countTeam2').text(100 - value);
        if (value>50) {
            $('.possession-team').text($('.home-team').find('.team-name').text());
            $('.possession-title').find('.lamp').addClass('lamp-confirm');
        } else if (value<50 && value>0){
            $('.possession-team').text($('.visit-team').find('.team-name').text());
            $('.possession-title').find('.lamp').addClass('lamp-confirm');
        } else  if (value == 50){
            $('.possession-team').text('ничья');
            $('.possession-title').find('.lamp').addClass('lamp-confirm');
        }

    }).trigger("change");

    // изменение бегунка в случае набора процентов в ручную
    $('.countTeam1').on('change', function () {
        var value = forecast.possession = Number(this.value);
        forecast.possession = Number(this.value);
        $('#possession').css({'background':'-webkit-linear-gradient(left ,#8870FF 0%,#8870FF '+value+'%,yellow '+value+'%, yellow 100%)'});
        $('#possession').val(value);
        $('.countTeam2').text(100 - value);
        $('.possession-title').find('.lamp').addClass('lamp-confirm');
        console.log('forecast', forecast);
    });
});

