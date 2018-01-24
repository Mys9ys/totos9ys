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
    <?dd($messages)?>
@endif
<script src="{{ asset('public/block/forecast/script.js') }}"></script>
@include('layouts.footer')