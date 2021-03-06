<link href="{{ asset('public/block/events/style.css') }}" rel="stylesheet">
<? date_default_timezone_set('Europe/Moscow');
$today = date('Y-m-d H:i:s');?>
<div class="events_block">
    <div class="container">
        <div class="tournament-title">
            <span class="tournament-title-text">Наши турниры</span><span><div class="hockey-puck"><div class="puck"></div></div></span>
            <span><i class="fa fa-futbol-o "></i></span>
        </div>
        <?$arEvents = \App\Events::all();?>
        <?foreach ($arEvents as $event){?>
            <div class="tournament-wrap relative">
                <div class="tournament-avatar"><img src="public/image/tournament/<?=$event['avatar']?>.jpg" alt=""></div>
                <div class="tournament-center float-left">
                    <div class="tournament-block float-left"><div class="tournament-block-title">Название: </div><span><?=$event['name']?></span></div>
                    <div class="tournament-block float-left"><div class="tournament-block-title">Короткое название: </div><span><?=$event['short_name']?></span></div><br>
                    <div class="tournament-block float-left"><div class="tournament-block-title">Количество команд: </div><span><?=$event['teams']?></span></div>
                    <div class="tournament-block float-left"><div class="tournament-block-title">Количество групп: </div><span><?=$event['group']?></span></div>
                    <div class="tournament-block float-left"><div class="tournament-block-title">Количество матчей: </div><span><?=$event['count_match']?></span></div>

                </div>
                <div class="tournament-block tournament-date">
                    <?if($today<$event['start_event']){?>
                        <div class="tournament-block-title greenColor">Начнется: </div><span><?=time_counting(strtotime($event['start_event']))?></span>
                    <?} elseif($today>$event['start_event']&& $today<$event['end_event'])  {?>
                        <div class="tournament-block-title liteGreenColor">Закончится: </div><span><?=time_counting(strtotime($event['end_event']))?></span>
                    <?} else{?>
                        <div class="tournament-block-title">Закончился: </div><span><?=time_counting(strtotime($event['end_event']))?></span>
                    <?}?>
                </div>
                <div class="tournament-btn btn-tournament-descrition">Развернуть описание</div>
            </div>
        <div class="tournament-descrition-box">
            <textarea class=""><?=$event['description']?></textarea>
            <div class="tournament-descrition-close"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
        </div>

        <?}?>

    </div>
</div>
@if(Auth::guest())
@else
    <?if(Auth::user()->role == 'admin'){?>
    <div class="events_admin_block">
        <div class="container">

            <h4>Блок администрирования турниров</h4>
            <div class="event-btn add_event">Добавить турнир</div>
            <div class="add_event_box">
                <div class="add_event_message"></div>
                <div class="form-wrap">
                    <input type="text" data="name" placeholder="Введите" class="event-info">
                    <span class="event-title">Название турнира</span>
                </div>
                <div class="form-wrap">
                    <input type="text" data="short_name" placeholder="Введите" class="event-info">
                    <span class="event-title">Короткое название</span>
                </div>
                <div class="form-wrap">
                    <select data="sport" class="event-info select-event">
                        <option value="">Выбрать</option>
                        <option value="1">Футбол</option>
                        <option value="2">Хоккей</option>
                    </select>
                    <span class="event-title">Вид спорта</span>
                </div>
                <div class="form-wrap">
                    <span class="event-title btn-avatar">Выберите аватар</span>
                </div>

                <img src="" alt="" id="avPreview">
                <input type="file" id="avatar" name="avatar" accept="image/jpeg,image/png,image/gif" data="avatar" class="event-info" >
                <div class="form-wrap">
                    <input type="date" class="event-info" data="start_event">
                    <span class="event-title data-event-title">Дата начала турнира</span>
                </div>
                <div class="form-wrap">
                    <input type="date" class="event-info" data="end_event">
                    <span class="event-title data-event-title">Дата начала турнира</span>
                </div>
                <div class="form-wrap">
                    <input type="number" placeholder="Введите" data="teams" class="event-info">
                    <span class="event-title">Количество команд</span>
                </div>
                <div class="form-wrap">
                    <input type="number" placeholder="Введите" data="group" class="event-info">
                    <span class="event-title">Количество групп</span>
                </div>
                <div class="form-wrap">
                    <input type="number" placeholder="Введите" data="count_match" class="event-info">
                    <span class="event-title">Количество матчей</span>
                </div>
                <div class="form-wrap">
                    <textarea type="number" placeholder="Введите описание" data="description" class="event-info"></textarea>
                    <span class="event-title end-title">Описание</span>
                </div>
                <button class="event-btn confirm-event">Добавить</button>
            </div>
            <button class="event-btn add_coutry_btn">Добавить страну</button>
            <div class="add_coutry_box">
                <div class="form-wrap">
                    <input type="text" placeholder="Введите" data="name" class="event-info country_name">
                    <span class="event-title">Название</span>
                </div>
                <div class="form-wrap">
                    <input class="type-search event-info" type="text" placeholder="Начните набирать"/>
                    <span class="event-title">Английское название</span>
                    <div class="flag-wrap">
                        <div class="confirm_massage country_confirm_message"></div>
                        <select size="5" class="select-search event-info country_code">
                            <?$dir = public_path() . "/image/flags/";// Папка с изображениями
                            $files = scandir($dir); // Берём всё содержимое директории
                            foreach ($files as $item){
                            if($item=='.' || $item=='..') continue;
                            $items = str_replace('.ico', '', $item);?>
                                <option value="<?=$items?>"><?=$items?></option>
                            <?}?>
                        </select>
                        <div class="flag-box"></div>
                    </div>
                </div>
                <button class="event-btn add_country_confirm">Добавить</button>
            </div>
            <h4>Заполнение турнира</h4>
            <div class="form-wrap">
                <input class="type-search event-info event-name-input" type="text" placeholder="Начните набирать"/>
                <span class="event-title">Выбрать турнир</span>
                <select size="2" class="select-search event-info events-select">
                    {{--<option value="">Выбрать</option>--}}
                    <?$arEvents = \App\Events::all();
                    foreach ($arEvents as $event){?>
                    <option value="<?=$event['id']?>"><?=$event['name']?></option>
                    <?}?>
                </select>
            </div>
            <div class="tornament-box">
                <button class="event-btn group-box-open">Группы</button>
                <button class="event-btn match-box-open">Матчи</button>
                <div class="group-box">
                </div>
                <div class="match-box">

                </div>
            </div>



        </div><?//end container?>
    </div>
    <?}?>
@endif



<script src="{{ asset('public/block/events/script.js') }}"></script>
<script src="{{ asset('public/block/events/admin.js') }}"></script>