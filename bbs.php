<?php
    if(!isset($_GET["mode"]))
        $mode = "list";
    else
        $mode = $_GET["mode"];

    if($mode == "list")
    {
        ?>
        <div class="row">
            <div class="col-1">순서</div>
            <div class="col-9">제목</div>
            <div class="col-2">작성자</div>
        </div>


        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs&mode=write' ">글쓰기</button>
            </div>
        </div>

        <?php
    }

    if($mode == "write")
    {
        echo "글쓰기";
    }
?>