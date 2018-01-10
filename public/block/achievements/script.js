$(document).ready(function () {
    console.log('width', $('.achievs').width());
    $('.achiev').height($('.achievs').width()/12);
    $('.achiev').width($('.achievs').width()/12);
    $('.achiev').show();
    $('.achiev').css('box-shadow', 'inset 0px 0 5px 5px red, 0px 0 0px 5px gray;');
    console.log('height', $('.achiev').height());
});