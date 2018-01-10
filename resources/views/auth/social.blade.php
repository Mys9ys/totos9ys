{{-- Social buttons--}}

<div class="text-center margin-bottom-20" id="uLogin"
     data-ulogin="display=panel;theme=flat;fields=first_name,last_name,email,nickname,photo,country;
                             providers=facebook,vkontakte,odnoklassniki,mailru;hidden=other;
                             redirect_uri={{ urlencode('http://' . $_SERVER['HTTP_HOST']) }}/ulogin;mobilebuttons=0;">
</div>
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" style="float:right;padding:5px 10px 0 0;z-index:1;position:relative;">&times;</button>
            <div class="modal-header">
                <h4 class="modal-title">Выполните вход через удобную соцсеть</h4>
            </div>
            <div class="modal-body">
            </div>
            {{--<div class="modal-footer"></div>--}}
        </div>
    </div>
</div>

<script src="//ulogin.ru/js/ulogin.js"></script>
