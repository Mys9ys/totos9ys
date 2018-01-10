

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" style="float:right;padding:5px 10px 0 0;z-index:1;position:relative;">&times;</button>
            <div class="modal-header">
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>



<!-- Scripts -->
<script src="{{ asset('public/js/js.js') }}"></script>
<script src="{{ asset('public/js/app.js') }}"></script>
<script src="{{ asset('public/js/jquery.cookie.js') }}"></script>

@include('auth.social')

<script>
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

    });
</script>