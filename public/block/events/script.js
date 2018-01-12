$(document).ready(function () {
    avatar = {};
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('meta[name="_token"]').attr('content'),
            'X-Requested-With': 'XMLHttpRequest',
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
        }
    });
    $('.add_events').click(function () {
        var data = {};
        $('.add_event').find('.event-info').each(function () {
            var $this = $(this);
            if ($this.attr('data')) {
                data[$this.attr('data')] = $this.val();
                if($this.attr('data')=='avatar'){
                    console.log('nawli kartinky', avatar);
                    data['avatar']= avatar;
                }
            }
        });
        // var start = $('#start_event').val();
        // var end = $('#end_event').val();
        // console.log('start',start);
        // console.log('end',end);
        console.log('data', data);
        console.log('avatar', avatar);
        $.ajax({
            url : '/addAvatar',
            // url : '/addAvatar',
            type : "POST",
            contentType: false, // важно - убираем форматирование данных по умолчанию
            processData: false, // важно - убираем преобразование строк по умолчанию
            data : 'vxjv',
            success:function(result){
                console.log(result);
            }
        });
        // $.post(
        //         '/addAvatar',
        //         data,
        //         function (result) {
        //
        //             //         var arResult = result.arHumor;
        //             //         getRandPerl(arResult);
        //             //         $('.humor_block').on('click', '.next_perl', function () {
        //             //             getRandPerl(arResult);
        //             //         });
        //         } , 'json'
        // );


        //     contentType: false, // важно - убираем форматирование данных по умолчанию
        //     processData: false, // важно - убираем преобразование строк по умолчанию

        // );
        // var data ={};
        // data.img = input.files[0];
        // console.log('input.files', $("#avatar").files);
    });
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avPreview').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function () {
        avatar = this.files[0];

        readURL(this);
    });


});
