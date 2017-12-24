<link href="{{ asset('public/humor/style.css') }}" rel="stylesheet">
<?if(Auth::user()->role == 'admin'){ $active = 'Y';} else {$active = 'N';}?>
<div class="humor_block" data-user="{{ Auth::user()->id }}" data-active="<?=$active?>"></div>

<script src="{{ asset('public/humor/script.js') }}"></script>
