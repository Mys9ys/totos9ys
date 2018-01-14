@extends('layouts.app')

@section('content')
<link href="{{ asset('public/css/forecast.css') }}" rel="stylesheet">
<?date_default_timezone_set('Europe/Moscow');
$today = date('Y-m-d H:i:s');
?>
<div class="container">
    <div id="forecast">
        <span class="titleFcst">Матчи</span>
        @foreach($forecastMatches as $match)
            <a href="{{ route('forecast', ['id' => $match->match_ID]) }}">
                <div>
                    <span>{{ $teams[$match->team_home_ID-1]->ISO }}</span>
                    <?$flagUrl = 'public/image/flags/'.$teams[$match->team_home_ID-1]->flag.'.ico';?>
                    <img src="{{ asset($flagUrl) }}" alt=""> -
                </div>
                <div>
                    <?$flagUrl = 'public/image/flags/'.$teams[$match->team_visit_ID-1]->flag.'.ico';?>
                    <img src="{{ asset($flagUrl) }}" alt="">
                <span>{{ $teams[$match->team_visit_ID-1]->ISO }}</span>
                </div>
            </a>
        @endforeach
    </div>
    @if($forecast)
        <?
        // сравнение счета
        if($matches->goal_home == $forecast->goal_home && $matches->goal_visit == $forecast->goal_visit ) {
            $score='greenForecast';
            $resultScore = 'greenForecast';
            $goal_margin='greenForecast';
            $goal_sum='greenForecast';
        }
        else { $score='redForecast';
        if ($matches->result == $forecast->result){ $resultScore = 'greenForecast';} else {$resultScore = 'redForecast';}
        if ($matches->goal_margin == $forecast->goal_margin) {$goal_margin = 'greenForecast';} else {$goal_margin = 'redForecast';}
        if ($matches->goal_sum == $forecast->goal_sum) {$goal_sum = 'greenForecast';} else {$goal_sum = 'redForecast';} }
        if ($matches->possession == $forecast->possession) {$possession = 'greenForecast';} else {$possession = 'redForecast';}
        if ($matches->possessionResult == $forecast->possessionResult) {$possessionResult = 'greenForecast';} else {$possessionResult = 'redForecast';}
        if ($matches->corner == $forecast->corner) {$corner = 'greenForecast';} else {$corner = 'redForecast';}
        if ($matches->yellow == $forecast->yellow) {$yellow = 'greenForecast';} else {$yellow = 'redForecast';}
        if ($matches->redCard == $forecast->redCard) {$redCard = 'greenForecast';} else {$redCard = 'redForecast';}
        if ($matches->penalty == $forecast->penalty) {$penalty = 'greenForecast';} else {$penalty = 'redForecast';}
        ?>
        <div id="forecastForm" class="container">
            <h4>Прогноз оформлен</h4>
<!--            --><?//dd($matches)?>
            <div class="teams">
                <div>
                    <span>{{ $teams[$matches->team_home_ID-1]->name }}</span>
                    <?$flagUrl = 'public/image/flags/'.$teams[$matches->team_home_ID-1]->flag.'.ico';?>
                    <img src="{{ asset($flagUrl) }}" alt="">
                    <label for="goal_home">
                        <input class="scoreTeam1 inputNumber <?echo $score?>" type="number" name="goal_home" value="{{ $forecast->goal_home }}" disabled>
                    </label>
                </div>
                <div>
                    <label for="goal_visit">
                        <input class="scoreTeam2 inputNumber <?echo $score?>" type="number" name="goal_visit" value="{{ $forecast->goal_visit }}" disabled>
                    </label>
                    <?$flagUrl = 'public/image/flags/'.$teams[$matches->team_visit_ID-1]->flag.'.ico';?>
                    <img src="{{ asset($flagUrl) }}" alt="">
                    <span>{{ $teams[$matches->team_visit_ID-1]->name }}</span>
                </div>
            </div>

            <div for="goal_margin">
                Разница мячей(заполняется автоматически)
                <input class="marginScore inputNumber <?echo $goal_margin?>" type="number" name="goal_margin" value="{{ $forecast->goal_margin }}" disabled>
            </div>
            <label for="goal_sum">
                Общее количество мячей(заполняется автоматически)
                <input class="sumScore inputNumber <?echo $goal_sum?>" type="number" name="goal_sum" value="{{ $forecast->goal_sum }}" disabled>
            </label><br>

            <fieldset><legend>Исход матча(заполняется автоматически)</legend>
                <label for="">
                    <input class="inputNumber <?echo $resultScore?>" type="text" name="result" value="{{ $forecast->result }}" disabled/>
                </label>
            </fieldset>



            <fieldset>
                <legend>Владение мячом %</legend>
                <input type="range" name="possession" id="possession" min="0" max="100" step="1" value="{{ $forecast->possession }}" disabled/>
                <output for="possession" class="possessionOutput inputNumber <?echo $possession?>" name="possessionOutput" >{{ $forecast->possession }}</output>
            </fieldset>



            <fieldset><legend>Итоговое владение</legend>
                    <input class="inputNumber <?echo $possessionResult?>" type="text" name="result" value="{{ $forecast->possessionResult }}" disabled/>
            </fieldset>




            <label for="corner">
                Угловые
                <input class="inputNumber <? echo $corner?>" type="number" name="corner" value="{{ $forecast->corner }}" disabled>
            </label><br>

            <label for="yellow">
                Желтые карточки
                <input class="inputNumber <? echo $yellow?>" type="number" value="{{ $forecast->yellow }}" name="yellow" disabled>
            </label><br>

            <label for="penalty">
                Пенальти
                <input type="number" class="penalty inputNumber <? echo $penalty?>" value="{{ $forecast->penalty }}" name="penalty" disabled><br>
                <label>
                    Будут:
                    <input type="checkbox" name="penaltyCheck">
                </label>
            </label><br>

            <label for="red">
                Красные карточки
                <input type="number" class="redCard inputNumber <? echo $redCard?>"  value="{{ $forecast->red }}" name="red" disabled><br>
                <label>
                    Будут:
                    <input type="checkbox" name="redCardCheck">
                </label>
            </label><br>
        </div>
    @elseif ($matches->match_datetime<$today)
        <h4>Матч завершен, прогноз невозможен</h4>
        @else
            <div id="forecastForm" class="container">
                <form action="{{ route('forecast', $matches->match_ID) }}" method="post">
                    <input type="text" name="forecast_datetime" style="display: none;" value="{{ $today }}">
                    <input type="text" name="match_ID" style="display: none;" value="{{ $matches->match_ID }}">
                    <input type="text" name="User_ID" style="display: none;" value="{{ Auth::user()->id }}">
                    <div class="teams">
                        <div>
                            <span>{{ $teams[$matches->team_home_ID-1]->name }}</span>
                            <?$flagUrl = 'public/image/flags/'.$teams[$matches->team_home_ID-1]->flag.'.ico';?>
                            <img src="{{ asset($flagUrl) }}" alt="">
                            <label for="goal_home">
                                <input class="scoreTeam1 inputNumber" min="0" type="number" name="goal_home">
                            </label>
                        </div>
                        <div>
                            <label for="goal_visit">
                                <input class="scoreTeam2 inputNumber" min="0" type="number" name="goal_visit">
                            </label>
                            <?$flagUrl = 'public/image/flags/'.$teams[$matches->team_visit_ID-1]->flag.'.ico';?>
                            <img src="{{ asset($flagUrl) }}" alt="">
                            <span>{{ $teams[$matches->team_visit_ID-1]->name }}</span>
                        </div>
                    </div>

                    <div for="goal_margin">
                        Разница мячей(заполняется автоматически)
                        <input class="marginScore inputNumber" type="number" name="goal_margin" >
                    </div>
                    <label for="goal_sum">
                        Общее количество мячей(заполняется автоматически)
                        <input class="sumScore inputNumber" type="number" name="goal_sum" >
                    </label><br>

                    <fieldset><legend>Исход матча(заполняется автоматически)</legend>
                        <label for="">
                            Победа первой
                            <input class="InputRadio" type="radio" name="result" value="П1" />
                        </label>
                        <label for="">
                            Ничья
                            <input type="radio" name="result" value="Н" />
                        </label>
                        <label for="">
                            Победа Второй
                            <input type="radio" name="result" value="П2" />
                        </label>
                    </fieldset>

                    <fieldset>
                        <legend>Владение мячом %</legend>
                        <input type="range" name="possession" id="possession" min="0" max="100" step="1" value="50"/>
                        <output for="possession" class="possessionOutput" name="possessionOutput"></output>
                    </fieldset>

                    <fieldset><legend>Итоговое владение(заполняется автоматически)</legend>
                        <label for="">
                            больший % у первой
                            <input type="radio" name="possessionResult" value="П1"/></label><br>
                        <label for="">
                            ничья
                            <input type="radio" name="possessionResult" value="Н"/></label><br>
                        <label for="">
                            больший % у второй
                            <input type="radio" name="possessionResult" value="П2"/></label><br>
                    </fieldset>

                    <label for="corner">
                        Угловые
                        <input class="inputNumber" type="number" min="0" name="corner">
                    </label><br>

                    <label for="yellow">
                        Желтые карточки
                        <input class="inputNumber" type="number" min="0" name="yellow">
                    </label><br>

                    <label for="penalty">
                        Пенальти
                        <input type="number" class="penalty inputNumber" min="0" name="penalty"><br>
                        <label>
                            Будут: да
                            <input type="radio" name="penaltyCheck" value="да"/></label><br>
                            нет
                        <input type="radio" name="penaltyCheck" value="нет"/></label><br>
                        </label>
                    </label><br>

                    <label for="red">
                        Красные карточки
                        <input type="number" class="redCard inputNumber"  min="0" name="red"><br>
                        <label>
                            Будут: да
                            <input type="radio" name="redCardCheck" value="да"/></label><br>
                            нет
                            <input type="radio" name="redCardCheck" value="нет"/></label><br>
                        </label>
                    </label><br>

                    {!! csrf_field() !!}
                    <input type="submit" value="спрогнозировать">

                </form>
            </div>
        @endif
        <div class="footer">
            <?if($matches->match_ID < count($forecastMatches) && $matches->match_ID>1) {
                $listprev = $matches->match_ID - 1;
                $listnext = $matches->match_ID + 1;
            } elseif ($matches->match_ID==1) {
                $listprev = count($forecastMatches);
                $listnext = $matches->match_ID + 1;
            } else {
                $listprev = $matches->match_ID - 1;
                $listnext = 1;
            }?>
            <a href="{{ route('forecast', ['id' => $listprev]) }}">Предыдущий</a>
            <a href="{{ route('forecast', ['id' => $listnext]) }}">Следующий</a>
        </div>
    </div>






    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="{{ asset('public/js/forecast.js') }}"></script>

@endsection