$(document).ready(function () {
    // блокируем события кнопок ответа при отсутствии регистрации
//        if (!$('.user_info').data('user')) {
//            console.log('mi tyt');
//            $('.humor_block').off('click', '.add_perl, .likes_perl');
//            $('.humor_block').on('click', '.add_perl, .likes_perl', function () {
//                $('#loginModal').modal('show');
//            });
//
//        }
    // вырезаем улогин и вставляем в модальное окно
    var content = $('#uLogin').detach();
    $('#loginModal').find('.modal-body').append(content);
    $('#uLogin').show();

    // кнопка войти
    $('.login_social').click(function () {
        $('#loginModal').modal('show');
    });

    // подсказки на ачивках
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });




    setInterval(function(){
//            loadNewMessage();
    }, 1000); // 1000 м.сек

});
function loadNewMessage(){
    $.ajaxSetup({
        cache: false,
        ifModified: true
    });

    var data = { 'id': $('.user_info').data('user')}
    $.post(
        '/newMessage',
        data,
        function (result) {
            if(result) {
                $('.messages').find('.badge').remove();
                $('.messages').append('<span class="badge">'+result+'</span>');
            }
            console.log('result', result);
        } , 'json'
    );
}