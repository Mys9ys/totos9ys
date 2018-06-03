@include('layouts.header')
<link href="{{ asset('public/block/forecast/style.css') }}" rel="stylesheet">
@if(Auth::guest())
    <div class="forecast_block forecast-red">
        <div class="container">
            <div class="forecast-form-wrap">
                <div class="forecast-form-info forecast-red">Вы не зарегистрированы</div>
                <div class="event-title data-event-title">Зарегистрироваться</div>
            </div>
        </div>
    </div>

@else
    <div class="forecast_block forecast_football">
        <div class="container forecast_wrap">
            <div class="match_block">
                <div class="match_info info_box football_shadow">
                    <div class="match_date left info_box">
                        <i class="fa fa-calendar" aria-hidden="true"></i><span>14.05.2018</span>
                    </div>
                    <div class="match_time left info_box">
                        <i class="fa fa-clock-o" aria-hidden="true"></i><span>18:00</span>
                    </div>
                    <div class="match_variance left info_box">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i><span>через 5 месяцев</span>
                    </div>
                </div>
                <div class="teams_block">
                    <div class="team_block">
                        <div class="team_flag left">
                            <img src="http://totos9ys.ru/public/image/flags/Russian.ico" alt="">
                        </div>
                        <div class="team_title left">Россия</div>
                        <p class="lamp"></p>
                        <div class="teams_goal right">1</div>
                    </div>
                    <div class="team_block">
                        <div class="team_flag left">
                            <img src="http://totos9ys.ru/public/image/flags/Saudi-Arabia.ico" alt="">
                        </div>
                        <div class="team_title left">Саудовская аравия</div>
                        <p class="lamp"></p>
                        <div class="teams_goal right">1</div>
                    </div>
                </div>
                <div class="main_match_info_box">
                    <div class="main_match_info_title">Основное</div>
                    <div class="match_result_wrap">
                        <div class="win1_box"><span>П1</span><input name="dzen" type="radio" value="nedzen"></div>
                        <div class="draw_box"><span>Н</span><input name="dzen" type="radio" value="nedzen"></div>
                        <div class="win2_box"><span>П2</span><input name="dzen" type="radio" value="nedzen"></div>
                    </div>
                    <div class="goals_sum_wrap">
                        <div class="goals_sum_title">
                            <i class="sum-icon">∑ <i class="fa fa-futbol-o" aria-hidden="true"></i></i><span>Количество голов</span>
                        </div>
                    </div>
                    <div class="goals_margin_wrap">
                        <div class="goals_margin_title">
                            <i class="margin-icon">+/- <i class="fa fa-futbol-o" aria-hidden="true"></i></i><span>Разница голов</span>
                            <p class="lamp"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="forecast_block forecast-football">
        <div class="container ">
            <h2>Football</h2>
            <div class="match-wrap relative">
                <div class="match-info football-shadow info-box">
                    <div class="match-time float-left info-box">
                        <i class="fa fa-clock-o" aria-hidden="true"></i><span>18:00</span>
                    </div>
                    <div class="match-date float-left info-box">
                        <i class="fa fa-calendar" aria-hidden="true"></i><span>14.05.2018</span>
                    </div>
                    <div class="match-variance float-left info-box">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i><span>через 5 месяцев</span>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="teams-wrap football-shadow-lite info-box forecast-football forecast-box">
                    <div class="home-team relative">
                        <div class="team-flag float-left">
                            <img src="http://totos9ys.ru/public/image/flags/Russian.ico" alt="">
                        </div>
                        <input type="number" class="goal-home team-goal float-right football-shadow" min="0"
                               placeholder="...">
                        <div class="team-name float-right">Россия</div>
                        <p class="lamp home-lamp"></p>
                    </div>
                    <div class="visit-team relative">
                        <div class="team-flag float-right">
                            <img src="http://totos9ys.ru/public/image/flags/Saudi-Arabia.ico" alt="">
                        </div>
                        <input type="number" class="goal-visit team-goal float-left football-shadow" min="0"
                               placeholder="...">
                        <div class="team-name float-left">Саудовская аравия</div>
                        <p class="lamp visit-lamp"></p>
                    </div>
                </div>
                <div class="match-result-wrap forecast-football info-box forecast-box">

                    <div class="result-title box-title title-left float-left football-shadow relative">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        <span>Результат матча</span><p
                                class="lamp"></p></div>
                    <input class="result-box" id="result-box" type="range" min="0" max="2" step="1">
                    <div class="result-box-title">
                        <span>П1</span>
                        <span>Н</span>
                        <span>П2</span>
                    </div>
                    <div class="result-info">
                        <span><i class="fa fa-arrow-left" aria-hidden="true"></i> Выберите исход матча</span>
                    </div>
                </div>
                <div class="goals-count-wrap forecast-football info-box forecast-box">
                    <div class="goal-preview box-title title-left float-left football-shadow">
                        Голы
                    </div>
                    <div class="goals-margin-title box-title float-left football-shadow relative">
                        <i class="margin-icon">+/- <i class="fa fa-futbol-o" aria-hidden="true"></i></i><span>Разница</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="goals-margin input-box float-left" placeholder="..."
                           data="goals-margin">
                    <div class="goals-sum-title box-title float-left football-shadow relative">
                        <i class="sum-icon">∑ <i class="fa fa-futbol-o" aria-hidden="true"></i></i><span>Количество(сумма)</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="goals-sum input-box float-left" placeholder="..."
                           data="goals-sum">
                </div>
                <div class="possession-wrap forecast-football info-box forecast-box">
                    <div class="possession-title box-title title-left float-left football-shadow relative">Владение мячом %<p
                                class="lamp"></p></div>
                    <div class="possession-team float-left">потяните бегунок
                        <i class="fa fa-arrow-right" aria-hidden="true"></i></div>
                    <div class="possession-block float-right">
                        <input type="number" class="countTeam1 count-possession float-left" placeholder="...">
                        <input type="range" class="float-left" id="possession" min="0" max="100" step="1" value="0"/>
                        <div class="countTeam2 count-possession float-left">100</div>
                    </div>
                </div>
                <div class="card-wrap forecast-football info-box forecast-box">
                    <div class="card-title box-title title-left float-left football-shadow">Карточки</div>
                    <div class="yellow-card-title box-title float-left football-shadow"><i
                                class="card-icon"></i><span>Желтые</span>
                        <p class="lamp"></p></div>
                    <input type="number" class="yellow-card input-box yellowLite float-left" min="0" placeholder="...">
                    <div class="red-card-title box-title float-left football-shadow"><i
                                class="card-icon red"></i><span>Красные</span>
                        <p class="lamp"></p></div>
                    <input type="number" class="red-card input-box redLite float-left" min="0" placeholder="...">
                    <div class="corner-title float-left box-title football-shadow"><i class="corner-icon"><i
                                    class="circle-corner"></i></i><span>Угловые</span>
                        <p class="lamp"></div>
                    <input type="number" class="corner input-box float-left" min="0" placeholder="...">
                </div>
                <div class="penalty-wrap forecast-football info-box forecast-box">
                    <div class="penalty-title box-title title-left float-left football-shadow">
                        <i class="penalty-icon"><i class="field greenlite"><i class="fa fa-futbol-o" aria-hidden="true"></i></i><i class="semicircle"></i></i>
                        <span>Пенальти</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="penalty input-box float-left" placeholder="...">
                    <div class="extra-time-title box-title float-left football-shadow">
                        <i class="extra-time-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-clock-o" aria-hidden="true"></i></i>
                        <span>Дополнительное время</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="range" id="extra-time" class="float-left range" data="extraTime" min="0" step="1" max="1" value="0">
                    <div class="series-penalty-title box-title float-left football-shadow">
                        <i class="series-penalty-icon">
                            <i class="fa fa-futbol-o" aria-hidden="true"></i>
                            <i class="fa fa-futbol-o" aria-hidden="true"></i>
                            <i class="fa fa-futbol-o" aria-hidden="true"></i>
                            <i class="fa fa-futbol-o" aria-hidden="true"></i>
                            <i class="fa fa-futbol-o" aria-hidden="true"></i>
                        </i>
                        <span>Серия пенальти</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="range" id="series-penalty" class="float-left range" data="penSeries" min="0" step="1" max="1" value="0">
                    {{--<div class="series-penalty float-left">не будет</div>--}}
                </div>
                <div class="shot-wrap forecast-football info-box forecast-box">
                    <div class="shot-preview box-title title-left float-left football-shadow">Удары</div>
                    <div class="all-shot-title box-title float-left football-shadow">
                        <i class="all-shot-icon"><i class="fa fa-futbol-o" aria-hidden="true"></i></i>
                        <span>Всего</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="all-shot input-box float-left" data="allShot" placeholder="...">
                    <div class="in-gate-title box-title float-left football-shadow">
                        <i class="in-gate-icon"><i class="fa fa-futbol-o" aria-hidden="true"></i></i>
                        <span>В створ</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="in-gate-shot input-box float-left" data="inGateShot" placeholder="...">
                    <div class="free-kick-title box-title float-left football-shadow">
                        <i class="free-kick-icon"><i class="whistle-circle"></i><i class="whistle-line"></i><i
                                    class="fa fa-futbol-o" aria-hidden="true"></i></i>
                        <span>Штрафные</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="free-kick input-box float-left" data="freeKick" placeholder="...">
                    <div class="crossbar-title box-title float-left football-shadow">
                        <i class="crossbar-icon"><i class="gate"></i><i class="fa fa-futbol-o greenlite" aria-hidden="true"></i></i>
                        <span>Штанга</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="crossbar input-box float-left" data="crossbar" placeholder="...">
                </div>
                <div class="field-event-wrap forecast-football info-box forecast-box">
                    <div class="shot-preview box-title title-left float-left football-shadow">Прочее</div>
                    <div class="out-title box-title float-left football-shadow">
                        <i class="out-icon"><i class="field"></i><i class="line"></i><i class="fa fa-futbol-o greenlite" aria-hidden="true"></i></i>
                        <span>Аут</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="out input-box float-left" data="out" placeholder="...">
                    <div class="offside-title box-title float-left football-shadow">
                        <i class="fa offside-icon fa-delicious" aria-hidden="true"></i>
                        <span>Офсайд</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="offside input-box float-left" data="offside" placeholder="...">
                </div>
                <div class="foot-random-wrap football-shadow">
                    <div class="random-title football-shadow">Заполнить случайно. Все:
                    </div>
                    <i class="fa fa-random all-random" title="все результаты" aria-hidden="true"></i>
                    <div class="rand-block-title">по блокам:</div>

                    <i class="fa fa-random score-random" aria-hidden="true"></i>
                    <i class="fa fa-random match-result-random" aria-hidden="true"></i>
                    <i class="fa fa-random goals-random" aria-hidden="true"></i>
                    <i class="fa fa-random possession-random" aria-hidden="true"></i>
                    <i class="fa fa-random cards-random" aria-hidden="true"></i>
                    <i class="fa fa-random penalty-random" aria-hidden="true"></i>
                    <i class="fa fa-random shots-random" aria-hidden="true"></i>
                    <i class="fa fa-random field-events-random" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>




    <div class="forecast_block forecast-hockey">
        <div class="container">
            <h2>Hockey</h2>
        </div>
    </div>

@endif
<script src="{{ asset('public/block/forecast/script.js') }}"></script>
@include('layouts.footer')