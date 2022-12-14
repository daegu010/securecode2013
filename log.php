<?php
    $sql = "select * from logs order by idx desc limit 50";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    // 순서, 이름, 작업, 날짜, 비고
?>

<div class="row">
    <div class="col-1">순서</div>
    <div class="col-2">이름</div>
    <div class="col-2">IP</div>
    <div class="col">작업</div>
    <div class="col">날짜</div>
</div>

<?php
    while($data)
    {
        ?>
        <div class="row">
            <div class="col-1"><?php echo $data["idx"] ?></div>
            <div class="col-2"><?php echo $data["name"] ?></div>
            <div class="col-2"><?php echo $data["ip"] ?></div>
            <div class="col"><?php echo $data["work"] ?></div>
            <div class="col"><?php echo $data["time"] ?></div>
        </div>
        <?php
        $data = mysqli_fetch_array($result);
    }
?>