<?php

    function getNow()
    {
        if(Date('G') <10)
            return Date('Ymd0Gis');
        else
            return Date('YmdGis');

        //20221215123456
    }

    function getFileExt($file)
    {
        // a.JPG, a.jpg
        $file = strtolower($file);
        $fileInfo = pathinfo($file);
        return $fileInfo["extension"];

        // a.jpg.php
        // a.hwp
    }

    //$y = Date('y-m-d G:i:s');
    //echo "y = $y<br>";


    if(!isset($_GET["mode"]))
        $mode = "list";
    else
        $mode = $_GET["mode"];

    if($mode == "view")
    {
        if(isset($_GET["idx"]))
            $idx = $_GET["idx"];

       
        $sql = "select * from bbs where idx='$idx' ";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($result);

        if($data)
        {
            $data["content"] = nl2br($data["content"]);
                                // New Line to Br tag

            $data["title"] = str_replace("<", "&lt;", $data["title"]);
            $data["title"] = str_replace(">", "&gt;", $data["title"]);
               
            $data["content"] = str_replace("<", "&lt;", $data["content"]);
            $data["content"] = str_replace(">", "&gt;", $data["content"]);
               
            ?>
            <div class="row">
                <div class="col-2">제목</div>
                <div class="col"><?php echo $data["title"] ?></div>
            </div>
            <div class="row">
                <div class="col-2">작성자</div>
                <div class="col"><?php echo $data["name"] ?></div>
            </div>

            <div class="row" style="min-height:200px;">
                <div class="col"><?php echo $data["content"] ?><br>
                    <?php
                        if($data["file"])
                        {
                            $ext = getFileExt($data["file"]);
                            if($ext == "jpg" or $ext == "jpeg" or $ext == "png")
                            {
                                echo "<img src='data/$data[file]' class='img-fluid rounded'>";
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-2">첨부</div>
                <div class="col">
                    <?php
                        if($data["file"])
                        {
                            echo "<a href='download.php?idx=$data[idx]'>$data[fname]</a>";
                        }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col text-center"> 
                    <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs2'" >목록</button>
                </div>
            </div>
            <?php
        }else
        {
            ?>
                <script>
                    alert('삭제된 글입니다.');
                    location.href='main.php?cmd=bbs2';
                </script>
            <?php
        }
    }
    if($mode == "list")
    {
        ?>
        <div class="row">
            <div class="col-1">순서</div>
            <div class="col-8">제목</div>
            <div class="col-1">첨부</div>
            <div class="col-2">작성자</div>
        </div>

        <?php
            $sql = "select * from bbs order by idx desc";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            while($data)
            {
                
                $data["title"] = str_replace("<", "&lt;", $data["title"]);
                $data["title"] = str_replace(">", "&gt;", $data["title"]);
                $file = $data["file"];

                if($file)
                {
                    $ext = getFileExt($file);
                    if($ext == "jpg" or $ext == "png")
                        $mark = "<span class='material-icons'>photo</span>";
                    else
                    $mark = "<span class='material-icons'>attach_file</span>";
                }
                    
                else
                    $mark = "";


                ?>
                <div class="row">
                    <div class="col-1"><?php echo $data["idx"] ?></div>
                    <div class="col-8"><a href="main.php?cmd=bbs2&mode=view&idx=<?php echo $data["idx"] ?>"><?php echo $data["title"] ?></a></div>
                    <div class="col-1"><?php echo $mark ?></div>
                    <div class="col-2"><?php echo $data["name"] ?></div>
                </div>
                <?php
                $data = mysqli_fetch_array($result); 
            }
        ?>


        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs2&mode=write' ">글쓰기</button>
            </div>
        </div>

        <?php
    }
    if($mode == "dbwrite")
    {
        $title = $_POST["title"];
        $name = $_POST["name"];
        $content = $_POST["content"];

        $tilte = str_replace("<", "&lt;", $title);
        $tilte = str_replace(">", "&gt;", $title);

        $content = str_replace("<", "&lt;", $content);
        $content = str_replace(">", "&gt;", $content);

        if(isset($_FILES["upfile"]) and strlen($_FILES["upfile"]["name"]))
        {
            $fname = $_FILES["upfile"]["name"];
            $ext = getFileExt($fname);
            $now = getNow();
            
            $file = "$now.$ext";
            echo "name = " . $_FILES["upfile"]["name"]  . "<br>";
            echo "size = " . $_FILES["upfile"]["size"]  . "<br>";
    
            move_uploaded_file($_FILES["upfile"]["tmp_name"], "data/$file");
            chmod("data/$file", 0777);
        }else
        {
            $file = "";
            $fname = "";
        }



        $sql = "insert into bbs (title, name, content, file, fname) 
                    values('$title', '$name', '$content', '$file', '$fname')";
        $result = mysqli_query($conn, $sql);

        if($result)
            $msg = "성공";
        else    
            $msg = "실패";

        echo "
        <script>
            alert('$msg');
            location.href='main.php?cmd=bbs2';
        </script>
        ";

    }
    if($mode == "write")
    {
        ?>
        <form name="bbs2Form" method="POST" enctype="multipart/form-data" action="main.php?cmd=bbs2&mode=dbwrite">
        <div class="row">
            <div class="col-2">제목</div>
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="제목을 입력하세요">
            </div>
        </div>
        <div class="row">
            <div class="col-2">작성자</div>
            <div class="col">
                <input type="text" name="name"  class="form-control" placeholder="작성자입력">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <textarea name="content" class="form-control" rows=10 placeholder="내용입력"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-2">첨부</div>
            <div class="col">
                <input type="file" name="upfile"  class="form-control" >
            </div>
        </div>


        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary btn-sm" >등록</button>
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs2'" >목록</button>
            </div>
        </div>
        </form>
        <?php
    }
?>