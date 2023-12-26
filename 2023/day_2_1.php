<?php

$in_lines = file('./inputs/in_day_2.txt');
$limit = array(
    0 => 12,    // red
    1 => 13,    // green
    2 => 14     // blue
);
$search = ["Game ", "red", "green", "blue"];
$fill = ["", "0", "1", "2"];
$id_sum = 0;

foreach($in_lines as $line){
    $error = 0;

    $tmp_line = str_replace($search, $fill, $line);
    $game = explode(": ", $tmp_line); // 0 = id | 1 = cubes
    $sets = explode("; ", $game[1]);

    foreach($sets as $set){
        $throws = explode(", ", $set);

        foreach($throws as $throw){
            $tmp = explode(" ", $throw);
            if($tmp[0] > $limit[intval($tmp[1])]){
                $error = 1;
            }
        }
    }

    if($error == 0){
        $id_sum += intval($game[0]);
    }
}
echo $id_sum; //in my case 1867