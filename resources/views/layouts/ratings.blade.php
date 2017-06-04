<div class="podiumBox">
    <div class="podium podium2">2</div>
    <div class="podium podium1">1</div>
    <div class="podium podium3">3</div>
    @foreach(array_slice($props, 0, 3) as $item)
        <div class="winner winner{{ $item['place'] }}">
            <span class="score">{{ $item['score'] }}</span>
            @if(!isset($item['image']))
            <span><img src="{{ $item['image'] }}"></span>
            @else
            <span><img src="/public/image/avatar/{{ rand(1,9) }}.jpg"></span>
            @endif
            <span class="user_name">{{ $item['user_name'] }}</span>
        </div>
    @endforeach
</div>
<div class="players">
    @foreach(array_slice($props, 3) as $item)
        <p>
            <span class="place">{{ $item['place'] }}</span>
            @if(!isset($item['image']))
                <span><img src="{{ $item['image'] }}"></span>
            @else
                <span><img src="/public/image/avatar/{{ rand(1,9) }}.jpg"></span>
            @endif
            <span class="user_name">{{ $item['user_name'] }}</span>
            <span class="score">{{ $item['score'] }}</span>
        </p>
    @endforeach
</div>