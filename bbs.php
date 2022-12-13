<?php
    if(!isset($_GET["mode"]))
        $mode = "list";
    else
        $mode = $_GET["mode"];

    if($mode == "list")
    {
        echo "목록보기";
    }

    if($mode == "write")
    {
        echo "글쓰기";
    }
?>