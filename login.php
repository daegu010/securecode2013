로그인 실행
<?php
    if(isset($_POST["secureid"]) and $_POST["secureid"])
        $id = $_POST["secureid"];
    else
        $id = "";

    if(isset($_POST["securepass"]) and $_POST["securepass"])
        $pass = $_POST["securepass"];
    else
        $pass = "";

    $id = str_replace("--", "", $id);
    $id = str_replace(" ", "", $id);
    $id = str_replace("'", "", $id);
    
    echo "id = $id , pass = $pass <br>";

    // pw = $pw_prefix$pass
    $sql = "select * from users where id='$id' and pass='$pass' ";
    //                                    ' or 2>1 limit 1, 1 -- 

    echo "sql = $sql <br>";
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