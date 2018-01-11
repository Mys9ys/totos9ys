$(document).ready(function () {
    $('.add_events').click(function () {
        var data = {};
        $('.add_event').children().each(function () {
            var $this = $(this);
            if ($this.attr('data')) {
                data[$this.attr('data')] = $this.val();
                if($this.attr('data')=='avatar'){
                    console.log('nawli kartinky');
                }
            }
        });
        // var start = $('#start_event').val();
        // var end = $('#end_event').val();
        // console.log('start',start);
        // console.log('end',end);
        console.log('data', data);
        console.log('avatar', avatar);
        $.post(
            '/addAvatar',
            avatar,
            function (result) {
                console.log(result);
                //         var arResult = result.arHumor;
                //         getRandPerl(arResult);
                //         $('.humor_block').on('click', '.next_perl', function () {
                //             getRandPerl(arResult);
                //         });
            } , 'json'
        );
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
    avatar = {};
    $("#avatar").change(function () {
        avatar = this.files[0];

        readURL(this);
    });


});
