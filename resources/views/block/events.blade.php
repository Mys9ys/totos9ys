<link href="{{ asset('public/block/events/style.css') }}" rel="stylesheet">

<div class="events_block">
    <div class="container">

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
                    <textarea type="number" placeholder="Введите описание" data="description" class="event-info"></textarea>
                    <span class="event-title end-title">Описание</span>
                </div>
                <button class="event-btn confirm-event">Добавить</button>
            </div>
        </div>
    </div>
    <?}?>
@endif



<script src="{{ asset('public/block/events/script.js') }}"></script>