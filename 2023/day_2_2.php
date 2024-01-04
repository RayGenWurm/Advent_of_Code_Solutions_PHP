<?php


$in_lines = file('./inputs/in_day_2.txt');
$power = 0;
$search = ["Game ", "red", "green", "blue"];
$fill = ["", "0", "1", "2"];

foreach ($in_lines as $line) {

    $tmp_line = str_replace($search, $fill, $line);
    $game = explode(": ", $tmp_line); // 0 = id | 1 = cubes
    $sets = explode("; ", $game[1]);
    $sum = array(
        0 => 0,    // red
        1 => 0,    // green
        2 => 0     // blue
    );

    foreach ($sets as $set) {

        $throws = explode(", ", $set);
        foreach ($throws as $throw) {
            $tmp = explode(" ", $throw);
            if ($tmp[0] > $sum[intval($tmp[1])]) {
                $sum[intval($tmp[1])] = $tmp[0];
            }
        }
    }
    $power += $sum[0] * $sum[1] * $sum[2];


}
echo $power; //in my case 84538