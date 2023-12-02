<?php
// RayGenWurm, 02.12.2023

$in_lines = file('./inputs/in_day_1_1.txt');
$sum = 0;

foreach($in_lines as $line) {

    //loop chars of one line
    foreach (str_split($line) as $char) {
        if(is_numeric($char)){
            $sum += $char*10;
            break;
        }
    }

    // loop same line reversed
    foreach (array_reverse(str_split($line)) as $char) {
        if(is_numeric($char)){
            $sum += $char;
            break;
        }
    }
}

echo $sum;  //in my case its "55488"
