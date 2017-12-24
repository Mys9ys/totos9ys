@extends('layouts.app')

@section('content')
    <?date_default_timezone_set('Europe/Moscow');
    $today = date('Y-m-d H:i:s'); ?>
    <div class="container">
        @if($matches)
            @foreach($matches as $match)
                @if($today<$match->match_datetime)
                    <?continue;?>
                @endif

                <h4>{{ date("H:i", strtotime($match->match_datetime))}}  {{ date("d.m", strtotime($match->match_datetime))}}</h4>
                <h4>{{ $teams[$match->team_home_ID-1]->name }}</h4>
                <?$flagUrl = 'public/image/flags/'.$teams[$match->team_home_ID-1]->flag.'.ico';?>
                <img src="{{ asset($flagUrl) }}" alt="">
                <h4>{{ $teams[$match->team_visit_ID-1]->name }}</h4>
                <?$flagUrl = 'public/image/flags/'.$teams[$match->team_visit_ID-1]->flag.'.ico';?>
                <img src="{{ asset($flagUrl) }}" alt="">
            @endforeach
        @endif
    </div>
@endsection