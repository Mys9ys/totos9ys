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
            var arResult = result.arHumor;
            getRandPerl(arResult);
            $('.humor_block').on('click', '.next_perl', function () {
                getRandPerl(arResult);
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
        console.log('data', data);
        $.post(
            '/addPerl',
            data,
            function (result) {
                console.log('result', result);
                $('.humor_block').find('.add_perl_form').remove();
                $('.perl_box').html('<p>'+result+
                    '</p><br><div class="next_perl">следующий перл  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></div>' +
                    '<div class="add_perl">добавить  <i class="fa fa-plus-circle" aria-hidden="true"></i></div>');
            } , 'json'
        );
    });
});

// функция обработки массива шуток и вывода
function getRandPerl(arResult) {
    $('.humor_block').children().remove();

    // выбор случайного перла
    var res = Math.floor(Math.random()*arResult.length);

    // проверка на установку лайка
    var name = 'perlID'+ arResult[res]['id'];
    var likesPerl = 'fa-thumbs-o-up';
    if ($.cookie(name) != null) {
        var likesPerl = 'fa-thumbs-up';
    }

    var content = '<p>'+arResult[res]['text']+'</p>';
    content = '<div class="perl_box" data-id="'+arResult[res]['id']+'">' +
        '<div class="perl_stat"><div class="perl_likes_count"><i class="fa fa-thumbs-up" aria-hidden="true"></i>  '+arResult[res]['likes']+'</div>' +
        '<div class="perl_views_count"><i class="fa fa-eye" aria-hidden="true"></i>  '+arResult[res]['views']+'</div></div>' +
        ''+content+''+
        '<div class="likes_perl">нравится  <i class="fa '+likesPerl+'" aria-hidden="true"></i></div>' +
        '<div class="next_perl">следующий перл  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></div>' +
        '<div class="add_perl">добавить  <i class="fa fa-plus-circle" aria-hidden="true"></i></div>' +
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

