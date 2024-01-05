<?php

$in_lines = file('./inputs/in_day_3.txt');
$game_grid = [[]];
$line_len = strlen($in_lines[0])-2;
$sum = 0;

//split input into 2D Array
$i = 0;
foreach ($in_lines as $line){
    foreach (str_split($line) as $char){
        $game_grid[$i][] = $char;
    }
    $i++;
}

//find numbers and loop through digits to check for nearby symbols
$line_num = 0;
foreach ($in_lines as $line){
    preg_match_all("!\d+!", $line, $matches, PREG_OFFSET_CAPTURE);
    foreach ($matches[0] as $match){
        $num_len = strlen($match[0]);
        if(checkPos($game_grid, $line_num, $match[1], $num_len) == 1){
            $sum += $match[0];
        }
    }
    $line_num++;
}

echo $sum; //in my case 546563


// check if number is touching a symbol
function checkPos($grid, $line, $start_pos, $num_len){

    $out = 0;
    for($i = 0; $i < $num_len; $i++) {
        $pos_now = $start_pos + $i;
        // TL = Top left // BM = bottom middle
        $TL = @$grid[$line - 1][$pos_now - 1];
        $TM = @$grid[$line - 1][$pos_now];
        $TR = @$grid[$line - 1][$pos_now + 1];
        $ML = @$grid[$line][$pos_now - 1];
        $MR = @$grid[$line][$pos_now + 1];
        $BL = @$grid[$line + 1][$pos_now - 1];
        $BM = @$grid[$line + 1][$pos_now];
        $BR = @$grid[$line + 1][$pos_now + 1];

        if (!is_null($TL) &&!is_numeric($TL) && $TL !== "." && $TL !== "\r") {
            $out = 1;
        } elseif (!is_null($TM) && !is_numeric($TM) && $TM !== "." && $TM !== "\r") {
            $out = 1;
        } elseif (!is_null($TR) && !is_numeric($TR) && $TR !== "." && $TR !== "\r") {
            $out = 1;
        } elseif (!is_null($ML) && !is_numeric($ML) && $ML !== "." && $ML !== "\r") {
            $out = 1;
        } elseif (!is_null($MR) && !is_numeric($MR) && $MR !== "." && $MR !== "\r") {
            $out = 1;
        } elseif (!is_null($BL) && !is_numeric($BL) && $BL !== "." && $BL !== "\r") {
            $out = 1;
        } elseif (!is_null($BM) && !is_numeric($BM) && $BM !== "." && $BM !== "\r") {
            $out = 1;
        } elseif (!is_null($BR) && !is_numeric($BR) && $BR !== "." && $BR !== "\r") {
            $out = 1;
        }
    }

    return $out;
}