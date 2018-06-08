$(document).ready(function () {
    $('.checkbox-imitate').click(function () {
        $('.imitate-check').toggleClass('inactiveCheck');
        if($('.inactiveCheck').length>0){
            $('.subscribe-button').prop('disabled', true);
        } else {
            $('.subscribe-button').prop('disabled', false);
        }
    });
    $('.match_result_input_box').on('click', '.win_radio', function () {
        $('.win_radio').find('.futbol_radio').remove();
        console.log('tyt');
        $(this).append('<i class="fa fa-futbol-o futbol_radio" aria-hidden="true"></i>').data('win', '1');
    });

    // $('.match_result_input_box').child('.win_radio').eq(1).append('<i class="fa fa-futbol-o" aria-hidden="true"></i>');


    // Массив прогноза
    var forecast = {};

    // радиобаттон на исход матча
    $('.result-box').on('change',function () {
        var result = $(this).val();
        $('.result-box').parent().find('.lamp').addClass('lamp-confirm');
        matchResult(result);
    });


    // проставление исхода матча при операцией со счетом
    $('.goal-home, .goal-visit').on('change', function () {
        $('.goal-home, .goal-visit').parent().find('.lamp').addClass('lamp-confirm');
        var home = forecast.home = Number($('.goal-home').val());
        var visit = forecast.visit = Number($('.goal-visit').val());
        var result = forecast.margin =home-visit;
        var sum = forecast.sum = home+visit;
        $('.goals-margin').val(result);
        $('.goals-sum').val(sum).parent().find('.lamp').addClass('lamp-confirm');
        $('.result-box').parent().find('.lamp').addClass('lamp-confirm');
        matchResult(result);
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
        possetionResult(value);
    });

    // изменение бегунка в случае набора процентов в ручную
    $('.countTeam1').on('change', function () {
        var value = forecast.possession = Number(this.value);
        forecast.possession = Number(this.value);
        $('#possession').css({'background':'-webkit-linear-gradient(left ,#8870FF 0%,#8870FF '+value+'%,yellow '+value+'%, yellow 100%)'});
        $('#possession').val(value);
        possetionResult(value);
        $('.possession-title').find('.lamp').addClass('lamp-confirm');
        console.log('forecast', forecast);
    });

    //oбработчик пенальти
    $('.range').on('change',function () {
        var $this = $(this);
        var value = forecast[$this.attr('data')] = Number($this.val());
        $this.parent().children().eq($(this).index()-1).find('.lamp').addClass('lamp-confirm');
        $this.css({'background':'-webkit-linear-gradient(left ,#8870FF 0%,#8870FF '+value*100+'%,rgb(255, 78, 51) '+value*100+'%, rgb(255, 78, 51) 100%)'});

        console.log(forecast);

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
        var home = forecast.home = Math.floor(Math.random()* (5));
        var visit = forecast.visit = Math.floor(Math.random()* (5));
        $('.goal-home').val(home).parent().find('.lamp').addClass('lamp-confirm');
        $('.goal-visit').val(visit).parent().find('.lamp').addClass('lamp-confirm');
    });
    // Исход
    $('.match-result-random').click(function () {
        var result = forecast.forecast = Math.floor(Math.random()* (4 - 1));
        $('.result-box').val(result).parent().find('.lamp').addClass('lamp-confirm');
        matchResult(result);
    });
    // голы
    $('.goals-random').click(function () {
        var margin = forecast.margin = Math.floor(Math.random()* (5 + 5) -5);
        var sum = forecast.sum = Math.floor(Math.random()* (12));
        $('.goals-margin').val(margin).parent().find('.lamp').addClass('lamp-confirm');
        $('.goals-sum').val(sum).parent().find('.lamp').addClass('lamp-confirm');
    });
    // владение
    $('.possession-random').click(function () {
        var possession = forecast.possession = Math.floor(Math.random()* (60)+20);
        $('#possession').val(possession).parent().find('.lamp').addClass('lamp-confirm');
        possetionResult(possession);
    });
    // карточки
    $('.cards-random').click(function () {
        var yellow = forecast.yellow = Math.floor(Math.random()* (7));
        var red = forecast.red = Math.floor(Math.random()* (2));
        var corner = forecast.corner = Math.floor(Math.random()* (16));
        $('.yellow-card').val(yellow).parent().find('.lamp').addClass('lamp-confirm');
        $('.red-card').val(red).parent().find('.lamp').addClass('lamp-confirm');
        $('.corner').val(corner).parent().find('.lamp').addClass('lamp-confirm');
    });
    // пенальти
    $('.penalty-random').click(function () {
        var penalty = forecast.penalty = random(2, 0);
        $('.penalty').val(penalty);
        $('.penalty-title').find('.lamp').addClass('lamp-confirm');
        console.log('forecast', forecast);
    });
    // удары
    $('.shots-random').click(function () {
        $('.shot-wrap').find('input').each(function () {
            $(this).val(forecast[$(this).attr('data')]=random(20, 2)).parent().find('.lamp').addClass('lamp-confirm');
        });
        console.log('forecast', forecast);
    });
    // прочее
    $('.field-events-random').click(function () {
        $('.field-event-wrap').find('input').each(function () {
            $(this).val(forecast[$(this).attr('data')]=random(20, 2)).parent().find('.lamp').addClass('lamp-confirm');
        });
        console.log('forecast', forecast);
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
function random(max, min){
    return Math.floor(Math.random()* (max - min) + min);
}

function matchResult(result) {
    if (result==0){
        $('.result-box').parent().find('.result-info').find('span').text('Победит '+ $('.home-team').find('.team-name').text());
    }else if(result==2){
        $('.result-box').parent().find('.result-info').find('span').text('Победит '+ $('.visit-team').find('.team-name').text());
    }else {
        $('.result-box').parent().find('.result-info').find('span').text('Ничья в матче');
    }
}

function possetionResult(value) {
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
}

