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
                $('.tornament-box').find('h4').remove();
                $('.tornament-box').prepend('<h4>Заполняем '+result['name']+'</h4>');
                tournamentFill(result)
            }, 'json'
        );
    });

    // горячая подгрузка команд в select
    $('.group-box').on('focus','.teams-name',function () {
        $.post(
            '/getCountries',
            function (result) {
                $('.country-load').children().remove();
                var content = '<option >Выбрать</option>';
                $.each(result, function (index, value) {
                    content = content + '<option value="'+value["id"]+'" data="'+value["flag"]+'">'+value["name"]+'</option>';
                });
                $('.country-load').append(content);
            }, 'json'
        );
        // console.log('mi tyt focus');
    });
    // добавляем флажок
    $('.group-box').on('change','.teams-name',function () {
        $(this).parent().find('.teams-flag').children().remove();
        $(this).parent().find('.teams-flag').append('<img class="country-flag" alt="" src="/public/image/flags/' + $(this).find('option:selected').attr('data') + '.ico">');
        $(this).parent().find('.teams-flag').attr('data-flag', $(this).find('option:selected').attr('data'));
        $(this).parent().find('.teams-name').removeClass('country-load');
    });
    // добавляем команду в турнир
    $('.group-box').on('click','.add-team-tornament',function () {
        var data = {
            country: $(this).parent().find('.teams-name').val(),
            name: $(this).parent().find('option:selected').text(),
            rating: $(this).parent().find('.team-rating').val(),
            group: $(this).parent().data('group')+1,
            flag: $(this).parent().find('.teams-flag').data('flag'),
            tournament: $(this).parent().parent().data('tournament'),
            sport: $(this).parent().parent().data('sport'),
        };
        console.log('data',data);
        var $this = $(this);
        $.post(
            '/addTeams',
            data,
            function (result) {
                if(result == true) {
                    $this.parent().find('.add_team_confirm').append('<i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i>');
                }
            }, 'json'
        );
    });
    // открытие-закрытие окна групп 
    $('.group-box-open').click(function () {
        $('.group-box').toggle();
    });
    // открытие-закрытие окна групп 
    $('.match-box-open').click(function () {
        $('.match-box').toggle();
    });

    $('.match-box').on('click', '.add-match-tornament',function () {
        console.log('mi tyt');
    });


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
    $('.group-box').attr({'data-tournament': tournament['id'], 'data-sport': tournament['sport']}).children().remove();

    // console.log('tournament',tournament['id']);
    var content = `    
    `+groupFill(tournament);
    // console.log('groupFill(tournament)', groupFill(tournament));
    $('.group-box').append(content).show();
}

function groupFill(tournament) {
    var arGroup = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    var count = tournament['teams']/tournament['group'];
    var contents = '';
    for(j = 0; j < tournament['group']; j++){
        var groupContents = '<div class="group-title" data="'+j+'">Группа '+arGroup[j]+'</div>';
        for(i = 0; i < count; i++){
            var content = `
        <div class="teams" data-group="`+j+`">
            <select class="teams-name country-load" >
                <option value="">Выбрать</option>
            </select>
            <div class="teams-flag"></div>
            <input type="number" class="team-rating">
            <div class="team-flag"></div>
            <div class="add-team-tornament event-btn">добавить</div>  
            <div class="add_team_confirm"></div>
        </div>
        `;
            groupContents = groupContents + content;
        }
        contents = contents + groupContents;
    }
    // console.log('count', count);

    return contents;
}