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
    <div class="forecast_block forecast-football">
        <div class="container">
            <h2>Football</h2>
            <div class="match-wrap">
                <div class="match-info football-shadow info-box">
                    <div class="match-time float-left info-box"><i class="fa fa-clock-o" aria-hidden="true"></i><span>18:00</span>
                    </div>
                    <div class="match-date float-left info-box"><i class="fa fa-calendar" aria-hidden="true"></i><span>14.05.2018</span>
                    </div>
                    <div class="match-variance float-left info-box"><i class="fa fa-calendar-check-o"
                                                                       aria-hidden="true"></i><span>через 5 месяцев</span>
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

                    <div class="box-title result-title float-left football-shadow relative">Результат матча<p
                                class="lamp"></p></div>

                    <div class="home_win result-box float-left">
                        <span>Победит Россия</span>
                    </div>
                    <div class="nobody_win result-box float-left">
                        <span>ничья</span>
                    </div>
                    <div class="visit_win result-box float-left">
                        <span>Победит Саудовская аравия</span>
                    </div>
                </div>
                <div class="goals-count-wrap forecast-football info-box forecast-box">
                    <div class="goals-margin-title goals-box float-left football-shadow relative">
                        <i class="margin-icon">+/-</i> <i class="fa fa-futbol-o" aria-hidden="true"></i><span>Разница мячей</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="goals-margin goals-box float-left goal-count" placeholder="..."
                           data="goals-margin">
                    <div class="goals-sum-title goals-box float-left football-shadow relative">
                        <i class="sum-icon">∑</i> <i class="fa fa-futbol-o"
                                                     aria-hidden="true"></i><span>Сумма мячей</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="goals-sum goals-box float-left goal-count" placeholder="..."
                           data="goals-sum">
                </div>
                <div class="possession-wrap forecast-football info-box forecast-box">
                    <div class="possession-title float-left football-shadow relative">Владение мячом %<p
                                class="lamp"></p></div>
                    <div class="possession-team float-left">потяните бегунок
                        <i class="fa fa-arrow-right" aria-hidden="true"></i></div>
                    <div class="possession-block float-right">
                        <input type="number" class="countTeam1 count-possession float-left" placeholder="...">
                        <input type="range" class="float-left" id="possession" min="0" max="100" step="1" value="0"/>
                        <div class="countTeam2 count-possession float-left"></div>
                    </div>
                </div>
                <div class="card-wrap forecast-football info-box forecast-box">
                    <div class="card-title float-left football-shadow">Карточки</div>
                    <div class="yellow-card-title card-title-box float-left football-shadow"><i
                                class="card-icon"></i><span>Желтые</span>
                        <p class="lamp"></p></div>
                    <input type="number" class="yellow-card card-box yellowLite float-left" min="0" placeholder="...">
                    <div class="red-card-title card-title-box float-left football-shadow"><i
                                class="card-icon red"></i><span>Красные</span>
                        <p class="lamp"></p></div>
                    <input type="number" class="red-card card-box redLite float-left" min="0" placeholder="...">
                    <div class="corner-title float-left football-shadow"><i class="corner-icon"><i
                                    class="circle-corner"></i></i><span>Угловые</span>
                        <p class="lamp"></div>
                    <input type="number" class="corner card-box float-left" min="0" placeholder="...">
                </div>
                <div class="shot-wrap forecast-football info-box forecast-box">
                    <div class="shot-preview float-left football-shadow">Удары</div>
                    <div class="all-shot-title shot-title float-left football-shadow">
                        <i class="all-shot-icon"><i class="fa fa-futbol-o" aria-hidden="true"></i></i>
                        <span>Всего</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="all-shot shot-box float-left" placeholder="...">
                    <div class="in-gate-title shot-title float-left football-shadow">
                        <i class="in-gate-icon"><i class="fa fa-futbol-o" aria-hidden="true"></i></i>
                        <span>В створ</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="in-gate-shot shot-box float-left" placeholder="...">
                    <div class="free-kick-title shot-title float-left football-shadow">
                        <i class="free-kick-icon"><i class="whistle-circle"></i><i class="whistle-line"></i><i
                                    class="fa fa-futbol-o" aria-hidden="true"></i></i>
                        <span>Штрафные</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="free-kick shot-box float-left" placeholder="...">
                    <div class="crossbar-title shot-title float-left football-shadow">
                        <i class="crossbar-icon"><i class="gate "></i><i class="fa fa-futbol-o greenlite" aria-hidden="true"></i></i>
                        <span>Штанга</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="crossbar shot-box float-left" placeholder="...">
                </div>
                <div class="penalty-wrap forecast-football info-box forecast-box">
                    <div class="penalty-title shot-preview float-left football-shadow">
                        <i class="penalty-icon"><i class="field greenlite"><i class="fa fa-futbol-o" aria-hidden="true"></i></i><i class="semicircle"></i></i>
                        <span>Пенальти</span>
                        <p class="lamp"></p>
                    </div>
                    <input type="number" class="penalty shot-box float-left" placeholder="...">
                    <div class="extra-time-title shot-preview float-left football-shadow">
                        <i class="extra-time-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-clock-o" aria-hidden="true"></i></i>
                        <span>Дополнительное время</span>
                        <p class="lamp"></p>
                    </div>
                    <div class="extra-time float-left">не будет</div>
                    <div class="series-penalty-title shot-title float-left football-shadow">
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
                    <div class="series-penalty float-left">не будет</div>
                </div>
            </div>
        </div>
    </div>
    <i class="in-gate-icon"><i class="fa fa-futbol-o" aria-hidden="true"></i></i>
    <i class="all-shot-icon"><i class="fa fa-futbol-o" aria-hidden="true"></i></i>
    <i class="free-kick-icon"><i class="whistle-circle"></i><i class="whistle-line"></i><i class="fa fa-futbol-o" aria-hidden="true"></i></i>
    <i class="crossbar-icon"><i class="gate"></i><i class="fa fa-futbol-o greenlite" aria-hidden="true"></i></i>
    <i class="penalty-icon"><i class="field greenlite"><i class="fa fa-futbol-o" aria-hidden="true"></i></i><i class="semicircle"></i></i>
    <i class="series-penalty-icon">
        <i class="fa fa-futbol-o" aria-hidden="true"></i>
        <i class="fa fa-futbol-o" aria-hidden="true"></i>
        <i class="fa fa-futbol-o" aria-hidden="true"></i>
        <i class="fa fa-futbol-o" aria-hidden="true"></i>
        <i class="fa fa-futbol-o" aria-hidden="true"></i>
    </i>
    <i class="extra-time-icon"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-clock-o" aria-hidden="true"></i></i>

    <div class="subscribe-checkbox">
        <div class="checkbox-imitate">
            <div class="imitate-check"></div>
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