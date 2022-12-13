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

        <?php
            $sql = "select * from bbs order by idx desc";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            while($data)
            {
                ?>
                <div class="row">
                    <div class="col-1"><?php echo $data["idx"] ?></div>
                    <div class="col-9"><?php echo $data["title"] ?></div>
                    <div class="col-2"><?php echo $data["name"] ?></div>
                </div>
                <?php
                $data = mysqli_fetch_array($result); 
            }
        ?>


        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs&mode=write' ">글쓰기</button>
            </div>
        </div>

        <?php
    }
    if($mode == "dbwrite")
    {
        $title = $_POST["title"];
        $name = $_POST["name"];
        $content = $_POST["content"];

        $sql = "insert into bbs (title, name, content) 
                    values('$title', '$name', '$content')";
        $result = mysqli_query($conn, $sql);

        if($result)
            $msg = "성공";
        else    
            $msg = "실패";

        echo "
        <script>
            alert('$msg');
            location.href='main.php?cmd=bbs';
        </script>
        ";

    }
    if($mode == "write")
    {
        ?>
        <form name="bbsForm" method="POST" action="main.php?cmd=bbs&mode=dbwrite">
        <div class="row">
            <div class="col-2">제목</div>
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="제목을 입력하세요">
            </div>
        </div>
        <div class="row">
            <div class="col-2">작성자</div>
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="작성자입력">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <textarea name="content" class="form-control" rows=10 placeholder="내용입력"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary btn-sm" >등록</button>
                <button type="button" class="btn btn-primary btn-sm" onClick="location.href='main.php?cmd=bbs'" >목록</button>
            </div>
        </div>
        </form>
        <?php
    }
?>