<?php
    function getDirs($path)
    {
        echo "path = $path <br>";
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
        echo "path = $path <br>";
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
                    echo "
                    <tr>
                        <td>$dirs[$cnt]</td>
                    </tr>
                    ";
                    $cnt ++;
                }
            ?>
        </table>
    
    </div>
    <div class="col">파일목록</div>
</div>