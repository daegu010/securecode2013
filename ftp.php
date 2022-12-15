<?php
    function getDirs($path)
    {
        //echo "path = $path <br>";
        $dirHandler = opendir($path);

        while( ($filename = readdir($dirHandler)) != false)
        {
            if(is_dir("$path/$filename"))
            {
                $files[] = $filename;
            }
        }

        return $files;
    }
    function getFiles($path)
    {
        //echo "path = $path <br>";
        $dirHandler = opendir($path);

        while( ($filename = readdir($dirHandler)) != false)
        {
            if(is_dir("$path/$filename"))
            {
            }else{
                $files[] = $filename;
            }
        }

        return $files;
    }

    

    $sess_path = "sess_path";

    if(!isset($_SESSION[$sess_path]) or $_SESSION[$sess_path] == "")
    {
        $_SESSION[$sess_path] = "./";
    }

    if(isset($_GET["pdir"]))
    {
        $_SESSION[$sess_path] = $_GET["pdir"];
    }


?>

<div class="row">
    <div class="col-3">
        폴더목록<br>
        <table class="table">
            <?php
                $dirs = getDirs($_SESSION[$sess_path]);
                $cnt = 0;
                while(isset($dirs[$cnt]))
                {
                    $nextDir = $_SESSION[$sess_path] . "/" . $dirs[$cnt];
                    echo "
                    <tr>
                        <td ><a href='main.php?cmd=ftp&pdir=$nextDir'>$dirs[$cnt]</a></td>
                    </tr>
                    ";
                    $cnt ++;
                }
            ?>
        </table>
    
    </div>
    <div class="col">
        파일목록<br>
        <table class="table">
            <?php
                $files = getFiles($_SESSION[$sess_path]);
                $cnt = 0;
                while(isset($files[$cnt]))
                {
                    echo "
                    <tr>
                        <td >$files[$cnt]</td>
                    </tr>
                    ";
                    $cnt ++;
                }
            ?>
        </table>
    
    </div>
</div>
<div class="row">    
    <div class="col">
        <textarea class="form-control" rows="10" name="content"></textarea>
    </div>                
</div>
<div class="row">
    <div class="col-3">파일명</div>    
    <div class="col">
        <input type="text" class="form-control" name="myfile" placeholder="파일명">
    </div>                
</div>
