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
    // моделирование нажатия input-file
    $('.btn-avatar').click(function () {
        $('#avatar').click();
    });
    $('.confirm-event').click(function () {
        var data = {};
        $('.add_event_box').find('.event-info').each(function () {
            var $this = $(this);
            if ($this.attr('data')) {
                data[$this.attr('data')] = $this.val();
            }
        });
        console.log('data event', data);
        $.post(
            '/addEvent',
            data,
            function (result) {
                $('.add_event_message').append('<p>'+result+'</p>')
            }, 'json'
        );
    });

    $('.add_event').click(function () {
        $('.add_event_box').toggle();
    });
    $('.add_coutry_btn').click(function () {
        $('.add_coutry_box').toggle();
    });

    $('.add_country_confirm').click(function () {
        var data = {
            name: $('.country_name').val(),
            flag: $('.country_code').val(),
        };
        $.post(
            '/addCountry',
            data,
            function (result) {
                $('.country_confirm_message').children().remove();
                $('.country_confirm_message').append('<p>' + result + '</p>');
            }, 'json'
        );
        console.log('data', data);
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


// собственно поиск
    $('.type-search').on('keyup', function () {
        var $this = $(this);
        var field = $this.parents().children('.select-search').find('option');
        var q = new RegExp($(this).val(), 'ig');
        if ($this.parent().find('.flag-wrap').length>0) {
            var field = $this.parent().find('.flag-wrap').children('.select-search').find('option');
            var q = new RegExp(cyrill_to_latin($(this).val()), 'ig');
        }

        for (var i = 0, l = field.length; i < l; i += 1) {
            var option = $(field[i]),
                parent = option.parent();

            if ($(field[i]).text().match(q)) {
                if (parent.is('span')) {
                    option.show();
                    parent.replaceWith(option);
                }
            } else {
                if (option.is('option') && (!parent.is('span'))) {
                    option.wrap('<span>').hide();
                }
            }
        }

    });
    // вставляем флаг
    $('.country_code').on('change', function () {
        $('.flag-box').children().remove();
        var val = $(this).val();
        $('.flag-box').append('<img class="country-flag" alt="" src="/public/image/flags/' + val + '.ico">');
    });

    // выбор турнира для заполнения
    $('.events-select').on('change', function () {
        var data = {
            id: $(this).val()
        };
        console.log('data',data);
        $.post(
            '/getEvents',
            data,
            function (result) {
                tournamentFill(result)
            }, 'json'
        );
    });

    var arGroup = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    console.log('arGroup', arGroup[0]);
});
function cyrill_to_latin(text) {
    var arrru = new Array('Я', 'я', 'Ю', 'ю', 'Ч', 'ч', 'Ш', 'ш', 'Щ', 'щ', 'Ж', 'ж', 'А', 'а', 'Б', 'б', 'В', 'в', 'Г', 'г', 'Д', 'д', 'Е', 'е', 'Ё', 'ё', 'З', 'з', 'И', 'и', 'Й', 'й', 'К', 'к', 'Л', 'л', 'М', 'м', 'Н', 'н', 'О', 'о', 'П', 'п', 'Р', 'р', 'С', 'с', 'Т', 'т', 'У', 'у', 'Ф', 'ф', 'Х', 'х', 'Ц', 'ц', 'Ы', 'ы', 'Ь', 'ь', 'Ъ', 'ъ', 'Э', 'э');

    var arren = new Array('Ya', 'ya', 'Yu', 'yu', 'Ch', 'ch', 'Sh', 'sh', 'Sh', 'sh', 'Zh', 'zh', 'A', 'a', 'B', 'b', 'V', 'v', 'G', 'g', 'D', 'd', 'E', 'e', 'E', 'e', 'Z', 'z', 'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'R', 'r', 'S', 's', 'T', 't', 'U', 'u', 'F', 'f', 'H', 'h', 'C', 'c', 'Y', 'y', '`', '`', '\'', '\'', 'E', 'e');

    for (var i = 0; i < arrru.length; i++) {
        var reg = new RegExp(arrru[i], "g");
        text = text.replace(reg, arren[i]);
    }
    return text;
}
function tournamentFill(tournament) {
    $('.tournament-box').children().remove();

    console.log('tournament',tournament['id']);
    var content = `
    <h4>Заполняем `+tournament['name']+`</h4>
    `+groupFill(tournament);
    console.log('groupFill(tournament)', groupFill(tournament));
    $('.tournament-box').append(content).show();

}

function groupFill(tournament) {
    var arGroup = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    var count = tournament['teams']/tournament['group'];
    for(i = 0; i < count; i++){
        var content = `
        <div class="teams">
            <select class="teams-name">
                <option value="">Выбрать</option>
            </select>
            <div class="teams-flag"><img src="/public/image/flags/Russian.ico" alt=""></div>
            <div class="add-to-bd event-btn">добавить</div>
        </div>
        `;
    }
    return content;


}