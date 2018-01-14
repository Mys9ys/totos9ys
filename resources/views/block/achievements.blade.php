<link href="{{ asset('public/block/achievements/style.css') }}" rel="stylesheet">

<div class="achievements_block">
    <?$arAchievs = array(
        '1'=> 'fa-pencil-square-o',
        '2'=> 'fa-check-circle-o',
        '3'=> 'fa-check-circle-o',
        '4'=> 'fa-check-circle-o',
        '5'=> 'fa-check-circle-o',
        '6'=> 'fa-check-circle-o',
        '7'=> 'fa-check-circle-o',
        '8'=> 'fa-check-circle-o',
        '9'=> 'fa-check-circle-o',
        '10'=> 'fa-check-circle-o',
        '11'=> 'fa-check-circle-o',
    ); ?>
    <div class="achievs container">
        <?foreach ($arAchievs as $achiev){?>
        <div class="achiev" data-toggle="tooltip" data-placement="top" title="Tooltip on &#013; left Tooltip on &#013; left">
            <i class="fa <?=$achiev?> " aria-hidden="true"></i>
        </div>
        <?}?>
    </div>
</div>

<script src="{{ asset('public/block/achievements/script.js') }}"></script>