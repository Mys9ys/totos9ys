<?php
date_default_timezone_set('Europe/Moscow');
// обработка времени
function time_counting($date)
{
    $date = time() - $date;
    if ($date>0) {
        $var = 1;
    } else {
        $var = 2;
        $date*=-1;
    }
    if ($date < 60) {
        $result = persuade_words($date, 'секунд', 'секунду', 'секунды', 'секунд');
    } else if ($date < 3600 && $date > 59) {
        $result = persuade_words(floor($date / 60), 'минут', 'минуту', 'минуты', 'минут');
    } else if ($date < 86400 && $date > 3599) {
        $result = persuade_words(floor($date / 3600), 'час', 'час', 'часа', 'часов');
    } else if ($date < 604800 && $date > 86399) {
        $result = persuade_words(floor($date / 86400), 'дней', 'день', 'дня', 'дней');
    } else if ($date < 2629743 && $date > 604799) {
        $result = persuade_words(floor($date / 604800), 'недель', 'неделю', 'недели', 'недель');
    } else if ($date < 31556926 && $date > 2629742) {
        $result = persuade_words(floor($date / 2629743), 'месяцев', 'месяц', 'месяца', 'месяцев');
    } else {
        $result = persuade_words(floor($date / 31556926), 'лет', 'год', 'года', 'лет');
    }
    if ($var == 1){
        return $result . ' назад';
    } else {
        return 'через ' . $result;
    }
}

// Склоняем слова
function persuade_words($count, $ending0, $ending1, $ending2_4, $ending5_9)
{
    if ($count < 1) {
        $count = $ending0;
    } else if ($count > 4 && $count < 21) {
        $count = $count . ' ' . $ending5_9;
    } else if ($count % 10 == 1) {
        $count = $count . ' ' . $ending1;
    } else if ($count % 10 > 1 && $count % 10 < 5) {
        $count = $count . ' ' . $ending2_4;
    } else {
        $count = $count . ' ' . $ending5_9;
    }
    return $count;
}