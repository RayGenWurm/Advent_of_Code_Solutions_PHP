<?php

$in_lines = file('./inputs/in_day_1.txt');
$str_numbers = array("one", "two", "three", "four", "five", "six", "seven", "eight", "nine");
$sum = 0;

foreach($in_lines as $line) {
    $count = 0;
    $tmp_chars = str_split($line);
    $tmp_check_string = "";

    //loop till one written number gets changed
    foreach($tmp_chars as $char) {
        $tmp_check_string = $tmp_check_string . $char;
        if($count == 0) {
            for ($i = 0; $i < 9; $i++) {
                $tmp_check_string = str_replace($str_numbers[$i], $i + 1, $tmp_check_string, $count);
            }
        }
    }

    //loop again but reversed to change one written number from behind
    $count = 0;
    $tmp_chars = str_split($tmp_check_string);
    $tmp_check_string = "";
    foreach(array_reverse($tmp_chars) as $char) {
        $tmp_check_string = $char . $tmp_check_string;
        if($count == 0) {
            for ($ib = 0; $ib < 9; $ib++) {
                $tmp_check_string = str_replace($str_numbers[$ib], $ib + 1, $tmp_check_string, $count);
                if($count != 0) { break; }
            }
        }
    }


    //loop chars of one line
    foreach (str_split($tmp_check_string) as $char) {
        if(is_numeric($char)){
            $sum += $char*10;
            $a = $char*10;
            break;
        }
    }

    // loop same line reversed
    foreach (array_reverse(str_split($tmp_check_string)) as $char) {
        if(is_numeric($char)){
            $sum += $char;
            $b = $char;
            break;
        }
    }
}

echo $sum;  //in my case its "55614"
