$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    // вызов массива с шутками
    $.post(
        '/humorLoad',
        function (result) {
            var arHumor = result.arHumor;
            var arUser = result.arUser;
            getRandPerl(arHumor, arUser);
            $('.humor_block').on('click', '.next_perl', function () {
                getRandPerl(arHumor,arUser);
            });
        } , 'json'
    );

    // добавляем лайк
    $('.humor_block').on('click', '.likes_perl', function () {
        if (!$('.user_info').data('user')) {
            $('#loginModal').modal('show');
        } else {
            var data = {
                'id': $('.perl_box').data('id')
            };
            var name = 'perlID'+ $('.perl_box').data('id');
            // проверяем поставлен ли лайк
            if ($.cookie(name) == null) {
                $.cookie(name, 'likes', { expires: 365 });
                $('.humor_block').find('.fa-thumbs-o-up').addClass('fa-thumbs-up').removeClass('fa-thumbs-o-up');
                // запись просмотра
                $.post(
                    '/perlLikes',
                    data,
                    function (result) {
                    } , 'json'
                );
            }
        }
    });

    // добавление шутки (открытие формы добавления)
    $('.humor_block').on('click', '.add_perl', function () {

        if (!$('.user_info').data('user')) {
            $('#loginModal').modal('show');
        } else {
            var content = '<div class="add_perl_form"><div class="close_form"><i class="fa fa-times-circle-o" aria-hidden="true"></i></div>' +
                '<textarea class="perl_add_text"></textarea>' +
                '<div class="confirm_add_perl">добавить  <i class="fa fa-plus-circle" aria-hidden="true"></i></div></div>';
            if($('.add_perl_form').length<1) {
                $('.humor_block').append(content);
            }
        }
    });

    // закрытие формы добавления перла
    $('.humor_block').on('click', '.close_form', function () {
        $('.humor_block').find('.add_perl_form').remove();
    });
    // подтверждение добавления перла
    $('.humor_block').on('click', '.confirm_add_perl', function () {
        var data = {
            user: $('.user_info').data('user'),
            text: $('.perl_add_text').val(),
            active: $('.user_info').data('active'),
        };

        $.post(
            '/addPerl',
            data,
            function (result) {

                $('.humor_block').find('.add_perl_form').remove();
                $('.perl_box').html('<p>'+result+
                    '</p><br><div class="next_perl">следующий перл  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></div>' +
                    '<div class="add_perl">добавить  <i class="fa fa-plus-circle" aria-hidden="true"></i></div>');
            } , 'json'
        );
    });
});

// функция обработки массива шуток и вывода
function getRandPerl(arResult, arUsers) {
    $('.humor_block').children().remove();

    // выбор случайного перла
    var res = Math.floor(Math.random()*arResult.length);
    var arUser = arUsers[arResult[res]['user']-1];

    // проверка на установку лайка
    var name = 'perlID'+ arResult[res]['id'];
    var likesPerl = 'fa-thumbs-o-up';
    if ($.cookie(name) != null) {
        var likesPerl = 'fa-thumbs-up';
    }
    // вычисляем дату
    var addDate = new Date(arUser.created_at);
    var countDate = time_counting(addDate);
    // кто добавил
    var added = '<div class="added-box">' +
        '<div class="added-left-box">'+
         '<div class="added-name">'+arUser.nik+'</div>'+
         '<div class="added-time">'+countDate+'</div>'+
        '</div>'+
        '<div class="added-avatar"><img src="'+arUser.avatar+'" alt=""></div></div>';

    //форма вывода шутки
    var content = '<p>'+arResult[res]['text']+'</p>';
    content = '<div class="perl_box" data-id="'+arResult[res]['id']+'">' +
        '<div class="perl_stat"><div class="perl_likes_count"><i class="fa fa-thumbs-up" aria-hidden="true"></i>  '+arResult[res]['likes']+'</div>' +
        '<div class="perl_views_count"><i class="fa fa-eye" aria-hidden="true"></i>  '+arResult[res]['views']+'</div></div>' +
        ''+content+''+
        '<div class="likes_perl">нравится  <i class="fa '+likesPerl+'" aria-hidden="true"></i></div>' +
        '<div class="next_perl">следующий перл  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></div>' +
        '<div class="add_perl">добавить  <i class="fa fa-plus-circle" aria-hidden="true"></i></div>' +
        added +
        '</div>';
    $('.humor_block').append(content);
    var data = {
        'id': arResult[res]['id']
    };
    // запись просмотра
    $.post(
        '/perlViews',
        data,
        function (result) {
        } , 'json'
    );
}

function time_counting($date){
    var nowDate = new Date();
    $date = (nowDate.valueOf() - $date.valueOf())/1000;
    if($date<60) {
        $result = persuade_words($date, 'секунд', 'секунду', 'секунды', 'секунд');
    } else if($date < 3600 && $date > 59 ) {
        $result = persuade_words(Math.floor($date/60), 'минут', 'минуту', 'минуты', 'минут');
    } else if ($date < 86400 && $date > 3599){
        $result = persuade_words(Math.floor($date/3600), 'час', 'час', 'часа', 'часов');
    } else if ($date < 604800 && $date > 86399) {
        $result = persuade_words(Math.floor($date/86400), 'дней', 'день', 'дня', 'дней');
    } else if ($date < 2629743 && $date > 604799) {
        $result = persuade_words(Math.floor($date/604800), 'недель', 'неделю', 'недели', 'недель');
    } else if ($date < 31556926 && $date > 2629742) {
        $result = persuade_words(Math.floor($date/2629743), 'месяцев', 'месяц', 'месяца', 'месяцев');
    } else {
        $result = persuade_words(Math.floor($date/31556926), 'лет', 'год', 'года', 'лет');
    }
    return $result + ' назад';
}

// Склоняем слова
function persuade_words($count, $ending0, $ending1,  $ending2_4, $ending5_9){
    if($count < 1) {$count = $ending0;}
    else if($count>4 && $count<21){ $count = $count + ' ' +$ending5_9;}
    else if($count%10 == 1){$count = $count + ' ' +$ending1;}
    else if($count%10>1 && $count%10<5) { $count = $count + ' ' +$ending2_4;}
    else {$count =  $count + ' ' +$ending5_9;}
    return $count;
}
