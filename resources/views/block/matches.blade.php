<link href="{{ asset('public/block/matches/style.css') }}" rel="stylesheet">
<? date_default_timezone_set('Europe/Moscow');
$today = date('Y-m-d H:i:s');
$yesterday = date('Y-m-d H:i:s', strtotime("-1 days"));
$tomorrow = date('Y-m-d H:i:s', strtotime("+1 days"));

?>
<div class="matches_block">
    <div class="container">
        <?$arMatches = \App\Matches::where('begin_date', '=', '2018-02-15 15:10:00')
            ->orWhere('begin_date', '=', '2018-02-17 06:10:00')
            ->orWhere('begin_date', '=', '2018-02-17 10:40:00')
            ->get();?>
            <?echo '<pre>';
//        echo strtotime("+1 day")
                echo $arMatches;
        echo '<br>';
        echo $today;
        echo '<br>';
        echo $yesterday;
        echo '<br>';
        echo $tomorrow;
        ?>
<!--        --><?//dd($arMatches)?>
        <div class="match-box">
            авы
        </div>

    </div>
</div>






<script src="{{ asset('public/block/matches/script.js') }}"></script>