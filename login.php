로그인 실행
<?php
    if(isset($_POST["id"]) and $_POST["id"])
        $id = $_POST["id"];
    else
        $id = "";

    if(isset($_POST["pass"]) and $_POST["pass"])
        $pass = $_POST["pass"];
    else
        $pass = "";

    echo "id = $id , pass = $pass <br>";

    $sql = "select * from users where id='$id' and pass='$pass' ";
    $result = mysqli_query($conn, $sql);
    if($result)
        $msg = "성공입니다.";
    else
        $msg = "로그인 실패";

?>