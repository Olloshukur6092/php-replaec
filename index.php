<?php

$str = 'Давайте устроим встречу 20.05.2022 и потом ещё одну 12.06.2022';

function strReplace($str)
{
    preg_match_all('/\d{2}\.\d{2}.\d{4}/', $str, $matches);

    $search = [];
    $replace = [];

    foreach ($matches as $date => $values) {
        foreach ($values as $key => $value) {
            $search[] = $value;
            $date = date("w", strtotime($value));
            switch ($date) {
                case '1':
                    $date = 'Понедельник';
                    break;
                case '2':
                    $date = 'Вторник';
                    break;
                case '3':
                    $date = 'Среда';
                    break;
                case '4':
                    $date = 'Четверг';
                    break;
                case '5':
                    $date = 'Пятница';
                    break;
                case '6':
                    $date = 'Суббота';
                    break;
                case '0':
                    $date = 'Воскресенье';
                    break;
            }
            $replace[] =  $value . ' ' . '(' . $date . ')';
        }
    }

    $str1 = str_replace($search, $replace, $str);

    return $str1;
}


echo strReplace($str);
