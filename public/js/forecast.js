$(document).ready(function() {
    $('.scoreTeam1, .scoreTeam2').bind('change click keyup', function () {
       var goal1 = Number($('.scoreTeam1').val());
       var goal2 = Number($('.scoreTeam2').val());
        $('.sumScore').val(goal1+goal2);
        $('.marginScore').val(goal1-goal2);

        if (goal1>goal2) {
            $("input:radio[name=result]").eq(0).prop('checked',true);
        } else if (goal1<goal2){
            $("input:radio[name=result]").eq(2).prop('checked',true);
        } else if (goal1!='' && goal1===goal2) {
            $("input:radio[name=result]").eq(1).prop('checked',true);
        } else {
            $("input:radio[name=result]").prop('checked',false);
        }
    });

    $('#possession').on("change", function() {
        $('.possessionOutput').val(this.value +"%" );
        var possessionOutput = Number(this.value);
        if (possessionOutput>50) {
            $("input:radio[name=possessionResult]").eq(0).prop('checked',true);
        } else if (possessionOutput<50){
            $("input:radio[name=possessionResult]").eq(2).prop('checked',true);
        } else if (possessionOutput==50) {
            $("input:radio[name=possessionResult]").eq(1).prop('checked',true);
        } else {
            $("input:radio[name=possessionResult]").prop('checked',false);
        }
    }).trigger("change");

    $('.penalty').bind('change click keyup', function () {
        if( $('.penalty').val()>0) {
            $("input[name=penaltyCheck]").eq(0).prop('checked',true);
        } else {
            $("input[name=penaltyCheck]").eq(1).prop('checked',true);
        }
    });

    $('.redCard').bind('change click keyup', function () {
        if( $('.redCard').val()>0) {
            console.log('mi tyt');
            $("input[name=redCardCheck]").eq(0).prop('checked',true);
        } else {
            $("input[name=redCardCheck]").eq(1).prop('checked',true);
        }
    });


});
