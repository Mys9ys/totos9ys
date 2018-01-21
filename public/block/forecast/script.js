$(document).ready(function () {
    $('.checkbox-imitate').click(function () {
        $('.imitate-check').toggleClass('inactiveCheck');
        if($('.inactiveCheck').length>0){
            $('.subscribe-button').prop('disabled', true);
        } else {
            $('.subscribe-button').prop('disabled', false);
        }
    });


    // Массив прогноза
    var forecast = {};

    // радиобаттон на исход матча
    $('.result-box').on('change',function () {
        var result = $(this).val();
        $('.result-box').parent().find('.lamp').addClass('lamp-confirm');
        matchResult(result);
    });
    function matchResult(result) {
        if (result==0){
            $('.result-box').parent().find('.result-info').find('span').text('Победит '+ $('.home-team').find('.team-name').text());
        }else if(result==2){
            $('.result-box').parent().find('.result-info').find('span').text('Победит '+ $('.visit-team').find('.team-name').text());
        }else {
            $('.result-box').parent().find('.result-info').find('span').text('Ничья в матче');
        }
    }

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
        $('.result-box').parent().find('.lamp').addClass('lamp-confirm');
        if (result>0){
            $('.result-box').val('0').parent().find('.result-info').find('span').text('Победит '+ $('.home-team').find('.team-name').text());
        }else if(result<0){
            $('.result-box').val('2').parent().find('.result-info').find('span').text('Победит '+ $('.visit-team').find('.team-name').text());
        }else {
            $('.result-box').val('1').parent().find('.result-info').find('span').text('Ничья в матче');
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

    $('.series-penalty, .extra-time').click(function () {
        $(this).parent().children().eq($(this).index()-1).find('.lamp').addClass('lamp-confirm');
        if($(this).text() == 'не будет') {
            $(this).text('будет');
        } else {
            $(this).text('не будет');
        }
    });
    // перевод фокуса на input
    $('.box-title').click(function () {
        $(this).parent().children().eq($(this).index()+1).focus();
    });
    // зажигаем лампу после изменения значения input
    $('input[type=number]').on('change', function(){
        $(this).parent().children().eq($(this).index()-1).find('.lamp').addClass('lamp-confirm');
    });
    // Заполнение случайными числами блоков
    // счет
    $('.score-random').click(function () {
        var home = forecast.home = Math.floor(Math.random()* (5 - 1)) + 1;
        var visit = forecast.visit = Math.floor(Math.random()* (5 - 1)) + 1;
        $('.goal-home').val(home).parent().find('.lamp').addClass('lamp-confirm');
        $('.goal-visit').val(visit).parent().find('.lamp').addClass('lamp-confirm');
    });
    // Исход
    $('.match-result-random').click(function () {
        var result = forecast.forecast = Math.floor(Math.random()* (4 - 1));
        $('.result-box').val(result).parent().find('.lamp').addClass('lamp-confirm');
        matchResult(result);
    });

    // все
    $('.all-random').click(function () {
        $(this).parent().find('.fa-random').not(this).each(function () {
            $(this).click();
        });
        console.log('forecast', forecast);
        // $('.score-random').click();
        // $('.match-result-random').click();
    });

});

