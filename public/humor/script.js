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
        var data = {
            'id': $('.perl_box').data('id')
        };
        // запись просмотра
        $.post(
            '/perlLikes',
            data,
            function (result) {
                // console.log('likes', result);
            } , 'json'
        );
    });

    // добавление шутки (открытие формы добавления)
    $('.humor_block').on('click', '.add_perl', function () {
        var content = '<div class="add_perl_form"><div class="close_form"><i class="fa fa-times-circle-o" aria-hidden="true"></i></div>' +
            '<textarea class="perl_add_text"></textarea>' +
            '<div class="confirm_add_perl">добавить  <i class="fa fa-plus-circle" aria-hidden="true"></i></div></div>';
        if($('.add_perl_form').length<1) {
            $('.humor_block').append(content);
        }
    });
    // закрытие формы добавления перла
    $('.humor_block').on('click', '.close_form', function () {
        $('.humor_block').find('.add_perl_form').remove();
    });
    // подтверждение добавления перла
    $('.humor_block').on('click', '.confirm_add_perl', function () {
        var data = {
            user: $('.humor_block').data('user'),
            text: $('.perl_add_text').val(),
            active: $('.humor_block').data('active'),
        };
        console.log('data', data);
    });
});

// функция обработки массива шуток и вывода
function getRandPerl(arResult) {
    $('.humor_block').children().remove();
    // console.log('arResult', arResult.length);
    var res = Math.floor(Math.random()*arResult.length);
    // console.log('res', res);
    // var count = res;
    var content = '<p>'+arResult[res]['text']+'</p>';
    content = '<div class="perl_box" data-id="'+arResult[res]['id']+'">' +
        '<div class="perl_stat"><div class="perl_likes_count"><i class="fa fa-thumbs-up" aria-hidden="true"></i>  '+arResult[res]['likes']+'</div>' +
        '<div class="perl_views_count"><i class="fa fa-eye" aria-hidden="true"></i>  '+arResult[res]['views']+'</div></div>' +
        ''+content+''+
        '<div class="likes_perl">нравится  <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></div>' +
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
           // console.log('result', result);
        } , 'json'
    );
}

