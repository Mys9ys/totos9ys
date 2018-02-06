$(document).ready(function () {
    $('.btn-tournament-descrition').click(function () {
        $(this).parent().next().show(400);
    });
    $('.tournament-descrition-close').click(function () {
       $(this).parent().hide(400);
    });
});