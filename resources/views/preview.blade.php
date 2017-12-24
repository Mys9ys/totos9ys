@extends('layouts.app')

@section('content')
    <?date_default_timezone_set('Europe/Moscow');
     $today = date('Y-m-d H:i:s'); ?>
    <div class="container">
        @if($matches)
            @foreach($matches as $match)
                @if($today>$match->match_datetime)
                    <?continue;?>
                @endif
                <div style="width: 80%; height: 60px; border-radius: 15px; border: 2px solid #5cb85c; background-color: rgba(250,250,250, 0.6);">
                    <div style="width: 10%; float: left">
                        <span style="display: inline-block; margin-left: 15px;">
                            {{ date("H:i", strtotime($match->match_datetime))}}
                            {{ date("d.m", strtotime($match->match_datetime))}}</span>
                    </div>
                    <div style="float: left; width: 45%">
                        <span style="display: inline-block; width: 30%">{{ $teams[$match->team_home_ID-1]->name }}</span>
                        <?$flagUrl = 'public/image/flags/'.$teams[$match->team_home_ID-1]->flag.'.ico';?>
                        <img src="{{ asset($flagUrl) }}" alt="" style="width: 20%; height: 50px;">
                    </div>
                    <div style="float: left; width: 45%">
                        <?$flagUrl = 'public/image/flags/'.$teams[$match->team_visit_ID-1]->flag.'.ico';?>
                        <img src="{{ asset($flagUrl) }}" alt="" style="width: 20%; height: 50px;">
                        <span style="display: inline-block; width: 30%; text-align: right">{{ $teams[$match->team_visit_ID-1]->name }}</span>
                    </div>
                </div>

            @endforeach
        @endif
    </div>
@endsection