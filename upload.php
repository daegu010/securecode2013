<?php
    if(isset($_FILES["upfile"]) and strlen($_FILES["upfile"]["name"]))
    {
        $fname = $_FILES["upfile"]["name"];
        echo "name = " . $_FILES["upfile"]["name"]  . "<br>";
        echo "size = " . $_FILES["upfile"]["size"]  . "<br>";

        move_uploaded_file($_FILES["upfile"]["tmp_name"], "data/$fname");
        chmod("data/$fname", 0777);
        // 월드컵.jpg
        //  20221215123456.jpg 월드컵.jpg
        echo "<a href='data/$fname'>$fname</a><br>";
        echo "
        <div class='row'>
            <div class='col-1'><img class='img-fluid' src='data/$fname'></div>
            <div class='col-2'><img class='img-fluid' src='data/$fname'></div>
            <div class='col-3'><img class='img-fluid' src='data/$fname'></div>
            
            <div class='col-1'><img class='img-fluid rounded' src='data/$fname'></div>
            <div class='col-2'><img class='img-fluid rounded-circle' src='data/$fname'></div>
            <div class='col-3'><img class='img-fluid' src='data/$fname'></div>
        </div>
        ";
        echo "<img src='data/$fname'>";
    }
?>

<form name="bbsForm" method="POST" enctype="multipart/form-data" action="main.php?cmd=upload">
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
            <div class="col-2">파일</div>
            <div class="col">
                <input type="file" name="upfile" class="form-control" placeholder="첨부파일">
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
            </div>
        </div>
        </form>
