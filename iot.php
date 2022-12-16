<?php
    $rand1  = rand(300, 400);
    $rand2 = rand(600, 610);

    $rand1 = sprintf("%.1f", $rand1 / 10);
    $rand2 = sprintf("%.1f", $rand2 / 10);

    echo "$rand1 , $rand2<br>";
    $sql = "insert into iot (temp, hum, time)
             values ('$rand1', '$rand2', now())";
    $result = mysqli_query($conn, $sql);
?>


    <script>
        setTimeout(function(){
            location.href='main.php?cmd=iot';
        }, 3000);
    </script>
