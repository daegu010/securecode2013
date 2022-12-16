<?php
    function ip2country($ip)
    {
        // ip = 1.2.3.4
        $splitIP = explode(".", $ip);
        //echo "ip_files/" .$splitIP[0] . ".php";
        include "ip_files/" .$splitIP[0] . ".php";
        
        $code =($splitIP[0] * 16777216) + ($splitIP[1] *65536) + ($splitIP[2] * 256) + ($splitIP[3]);
        foreach($ranges as $key => $value)
        {
            if($key <= $code)
            {
                if($ranges[$key][0] >= $code)
                    $country = $ranges[$key][1]; break;
            }
        }

        if(!isset($country))
            $country = "";

        if(isset($country) and $country == "")
        {
            $country = "noflag";
        }


        return $country;
    }


    $sql = "select * from logs order by idx desc limit 50";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    // 순서, 이름, 작업, 날짜, 비고
?>

<div class="row">
    <div class="col-1">순서</div>
    <div class="col-2">이름</div>
    <div class="col-2">IP</div>
    <div class="col-1">국가</div>
    <div class="col">작업</div>
    <div class="col">날짜</div>
</div>

<?php
    while($data)
    {
        $nation = ip2country($data["ip"]);
        $nationFlag = "<img src='flags/$nation.gif'>";
        ?>
        <div class="row">
            <div class="col-1"><?php echo $data["idx"] ?></div>
            <div class="col-2"><?php echo $data["name"] ?></div>
            <div class="col-2"><?php echo $data["ip"] ?></div>
            <div class="col-1"><?php echo $nationFlag ?></div>
            <div class="col"><?php echo $data["work"] ?></div>
            <div class="col"><?php echo $data["time"] ?></div>
        </div>
        <?php
        $data = mysqli_fetch_array($result);
    }
?>