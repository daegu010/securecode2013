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
    $data = mysqli_fetch_array($result);
    if($data)
    {
        $_SESSION["sessid"] = $id;
        $_SESSION["sessname"] = $data["name"];
        $msg = $_SESSION["sessname"] . "님 반갑습니다.";
    }        
    else
    {
        $msg = "로그인 실패";
    }
    
    echo "
    <script>
        alert('$msg');
        location.href='main.php';
    </script>
    ";

?>