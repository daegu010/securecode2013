<?php
    $letters = "abcdefghijklmnopqrstuvwxyz0123456789";
    $size = strlen($letters);



    if(!isset($_GET["cnt"]))
        $cnt = 1;
    else
        $cnt = $_GET["cnt"];

    // aaaa   aaab
    $first = (int)(((int)(((int) ($cnt -1) / $size) / $size))) % $size;
    $second = (int)(( (int)($cnt -1) /$size) /$size)  % $size;
    $third =  ((int)(($cnt -1) / $size)) % $size;
    $fourth = ($cnt -1) % $size; 

    $pw = $letters[$first] . $letters[$second] . $letters[$third] . $letters[$fourth];

    echo "$first $second $third $fourth<br>";
    echo "pw = $pw<br>";
?>