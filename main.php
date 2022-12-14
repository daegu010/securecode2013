<?php
    session_save_path("./sess");
    session_start();

    include "db.php";

    $conn = connectDB();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf8mb4">
        <title>🐱‍🚀💋시큐어 코딩💖😢</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>        

    </head>
<body>
    <?php
        //phpinfo();
    ?>


    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><span class="material-icons">home</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle linkwhite" href="#" role="button" data-bs-toggle="dropdown">SecureCode</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="main.php?cmd=printLogin">로그인</a></li>
                            <li><a class="dropdown-item" href="main.php?cmd=printLogin">SQL 인젝션</a></li>
                            <li><a class="dropdown-item" href="main.php?cmd=bbs">게시판</a></li>
                            <li><a class="dropdown-item" href="main.php?cmd=shell">웹 쉘</a></li>
                            <li><a class="dropdown-item" href="main.php?cmd=brute">Brute Force</a></li>
                            <li><a class="dropdown-item" href="main.php?cmd=brute2">Brute Force2</a></li>
                        </ul>
                        </li>

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">SecureCode2</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">무차별 대입</a></li>
                            <li><a class="dropdown-item" href="#">SQL 인젝션</a></li>
                            <li><a class="dropdown-item" href="#">A third link</a></li>
                        </ul>
                        </li>        
                    </ul>
                </div>
            </div>
        </nav>
        </div>

        <div class="row">
            <div class="col text-end">
                <?php
                    if(isset($_SESSION["sessid"]))
                        echo $_SESSION["sessname"]."님" ."<button type='button' class='btn btn-primary btn-sm' onClick=\"location.href='main.php?cmd=logout'\">로그아웃</button> ";
                    else
                        echo "<button type='button' class='btn btn-primary btn-sm' onClick=\"location.href='main.php?cmd=printLogin'\"> 로그인</button>";
                ?>
            </div>
        </div>

        <?php
            if(isset($_GET["cmd"]) and $_GET["cmd"])
            {
                $cmd = $_GET["cmd"];
                include "$cmd.php"; 
            }else
            {
                include "init.php";
            }
        ?>


    </div>
</body>
</html>

<?php
    closeDB($conn);
?>