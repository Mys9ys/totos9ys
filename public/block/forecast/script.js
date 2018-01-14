$(document).ready(function () {
    $('.checkbox-imitate').click(function () {
        $('.imitate-check').toggleClass('inactiveCheck');
        if($('.inactiveCheck').length>0){
            $('.subscribe-button').prop('disabled', true);
        } else {
            $('.subscribe-button').prop('disabled', false);
        }
    });





    // радиобаттон на исход матча
    $('.result-box').click(function () {
        $('.result-box').removeAttr('data-select').find('span').removeClass('select-box');
        var $this = $(this);
        $this.find('span').addClass('select-box');
        $this.attr('data-select','1');
    });

    // проставление исхода матча при операцией со счетом
    $('.goal-home, .goal-visit').on('change', function () {
        $('.result-box').removeAttr('data-select').find('span').removeClass('select-box');
        var home = Number($('.goal-home').val());
        var visit = Number($('.goal-visit').val());
        var result = home-visit;
        $('.goals-margin').find('span').text(result);
        $('.goals-sum').find('span').text(home+visit);
        if (result>0){
            $('.home_win').attr('data-select','1').find('span').addClass('select-box');
        }else if(result<0){
            $('.visit_win').attr('data-select','1').find('span').addClass('select-box');
        }else {
            $('.nobody_win').attr('data-select','1').find('span').addClass('select-box');
        }
    });
    // %владения мячом
    $('#possession').on("change", function() {
        var value = Number(this.value);
        $('#possession').css({'background':'-webkit-linear-gradient(left ,#8870FF 0%,#8870FF '+value+'%,yellow '+value+'%, yellow 100%)'});
        console.log('value', value);
        $('.countTeam1').val(value);
        $('.countTeam2').text(100 - value);
        var value = Number(this.value);
        if (value>50) {
            $('.possession-team').text($('.home-team').find('.team-name').text());
        } else if (value<50 && value>0){
            $('.possession-team').text($('.visit-team').find('.team-name').text());
        } else  if (value == 50){
            $('.possession-team').text('ничья');
        }
    }).trigger("change");

    // изменение бегунка в случае набора процентов в ручную
    $('.countTeam1').on('change', function () {
        var value = Number(this.value);
        $('#possession').css({'background':'-webkit-linear-gradient(left ,#8870FF 0%,#8870FF '+value+'%,yellow '+value+'%, yellow 100%)'});
        $('#possession').val(value);
        $('.countTeam2').text(100 - value);
    });
});
// функция - обработчик прокрутки бегунка
function range(){
    var val = $('#possession').val();
    $('#possession').css({'background':'-webkit-linear-gradient(left ,#8870FF 0%,#8870FF '+val+'%,yellow '+val+'%, yellow 100%)'});
}