<?php
    $family = "김,이,박,최,정,김,김,이,민,신,장,오,강,서,양,남궁,황보";
    $middle = "길,영,양,은,현,선,은,정";
    $last = "하,민,균,애,구,미,진,주,섭,성";

    $ip = $_SERVER["REMOTE_ADDR"];
    echo "ip = $ip<br>";

    $familys = explode(",", $family);
    $middles = explode(",", $middle);
    $lasts = explode(",", $last);

    for($i=1; $i<=100; $i++)
    {
        $rand1 = rand(0, count($familys)-1);
        $rand2 = rand(0, count($middles)-1);
        $rand3 = rand(0, count($lasts)-1);
        $name = $familys[$rand1] . $middles[$rand2] . $lasts[$rand3];
        echo "$name <br>";
    }

/*
    
    $dice[1] = 0;
    $dice[2] = 0;
    $dice[3] = 0;
    $dice[4] = 0;
    $dice[5] = 0;
    $dice[6] = 0;

    for($i=1; $i<=120000; $i++)
    {
        $diceFace = rand(1, 6);
        $dice[$diceFace] ++;
    }

    for($i=1; $i<=6; $i++)
    {
        echo "$i : $dice[$i] <br>";
    }
*/


   
    
?>