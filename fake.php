<?php
    $family = "김,이,박,최,정,남궁,황보";
    $middle = "길,영,양,은,현,선,은,정";
    $last = "하,민,균,애,구,미,진,주,섭,성";

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

    
?>