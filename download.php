<?php
     session_save_path("./sess");
     session_start();
 
     date_default_timezone_set("Asia/Seoul");
 
     include "db.php";
     include "config.php";
 
     $conn = connectDB();  
     
    $sql = "select * from bbs where idx='$_GET[idx]' ";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $fname = $data["fname"];
    $file_real = $data["file"];

    $file = "data/$file_real";
    $file_size = filesize($file);
    $file_dest = urlencode($fname);

    header("content-type:application/octet-stream; charset=utf-8;");
    header("content-length:" . $file_size);
    header("content-disposition:attachment; filename=".$file_dest);
    header("content-description:PHP Generated Data");
    header("Pragma:no-cache");
    header("Exipres:0");

    if(is_file("$file"))
    {
        $fp = fopen("$file", "r");

        if(!fpassthru($fp))
            fclose($fp);
    }
     
     closeDB($conn);
?>