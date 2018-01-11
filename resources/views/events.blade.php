<link href="{{ asset('public/block/events/style.css') }}" rel="stylesheet">

<div class="events_block">
    <div class="container">

    </div>
</div>

<?if(Auth::user()->role == 'admin'){?>
<div class="events_admin_block">
    <div class="container">
        <h4>Блок администрирования турниров</h4>
        <div class="add_events">Добавить турнир</div>
        <div class="add_event">
            <input type="text" id="name" placeholder="Полное название" data="name">
            <input type="text" name="short_name" placeholder="Короткое название" data="short_name">
            <select name="sport" data="sport">
                <option value="">Вид спорта</option>
                <option value="1">Футбол</option>
                <option value="2">Хоккей</option>
            </select>

                <span>Выберите аватар</span>
                <img src="" alt="" id="avPreview">
                <input type="file" id="avatar" name="avatar" accept="image/* " data="avatar">

                <span>дата начала турнира</span>
                <input type="date" name="start" data="start_event">

                <span>дата окончания турнира</span>
                <input type="date" name="end" data="end_event">

            <input type="number" placeholder="Количество команд" data="teams">
        </div>
    </div>
</div>
<?}?>


<script src="{{ asset('public/block/events/script.js') }}"></script>