<?php
    session_save_path("./sess");
    session_start();

    date_default_timezone_set("Asia/Seoul");

    include "db.php";
    include "config.php";

    $conn = connectDB();
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf8mb4">
        <title><?php echo $site_title ?></title>
        
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

        $query = $_SERVER["QUERY_STRING"];
        $ip = $_SERVER["REMOTE_ADDR"];

        $family = "김,이,박,최,정,김,김,이,민,신,장,오,강,서,양,남궁,황보";
        $middle = "길,영,양,은,현,선,은,정";
        $last = "하,민,균,애,구,미,진,주,섭,성";
    
        $ip = $_SERVER["REMOTE_ADDR"];
        //echo "ip = $ip<br>";
    
        $familys = explode(",", $family);
        $middles = explode(",", $middle);
        $lasts = explode(",", $last);

        $rand1 = rand(0, count($familys)-1);
        $rand2 = rand(0, count($middles)-1);
        $rand3 = rand(0, count($lasts)-1);
        $name = $familys[$rand1] . $middles[$rand2] . $lasts[$rand3];

        $ip1 = rand(1,254);
        $ip2 = rand(1,254);
        $ip3 = rand(1,254);
        $ip4 = rand(1,254);

        //$ip = "$ip1.$ip2.$ip3.$ip4";

        if(isset($cmd) and $cmd == "chart")
        {

        }else
        {
            //echo "query : $query<br>";
            $sql = "INSERT INTO logs (ip, name, work, time) 
            values('$ip', '$name', '$query', now() ) ";
            $result = mysqli_query($conn, $sql);
        }
        
        $sql = "select * from logs 
                    where ip='$ip' and 
                        time>= adddate(now(), interval -10 second)";
        $result = mysqli_query($conn, $sql);
        $connectCount = mysqli_num_rows($result);

        echo "connect Count = $connectCount<br>";

        if(isset($_GET["from"]) and $_GET["from"] == "sms")
        {

        }
        else if($connectCount >5  )
        {
            $smsMsg = "불법적인 접속이 감지되었습니다.";
            //include "sendSMS.php";
        }


    ?>


    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand linkwhite" href="main.php"><span class="material-icons text-white">home</span></a>
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
                            <li><a class="dropdown-item" href="main.php?cmd=fake">Fake Data</a></li>
                            <li><a class="dropdown-item" href="main.php?cmd=log">최신로그</a></li>
                            <li><a class="dropdown-item" href="main.php?cmd=chart">로그차트</a></li>
                            <li><a class="dropdown-item" href="main.php?cmd=crawling">뉴스크롤링</a></li>
                        </ul>
                        </li>

                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle linkwhite" href="#" role="button" data-bs-toggle="dropdown">SecureCode2</a>
                        <ul class="dropdown-menu">
                            <li><li><a class="dropdown-item" href="main.php?cmd=brute3">Brute (암호화)</a></li>
                            <li><li><a class="dropdown-item" href="main.php?cmd=upload">UPLOAD</a></li>
                            <li><li><a class="dropdown-item" href="main.php?cmd=ftp">FTP</a></li>
                            <li><li><a class="dropdown-item" href="main.php?cmd=bbs2">게시판2</a></li>
                            <li><li><a class="dropdown-item" href="main.php?cmd=wysiwyg">WYSIWYG</a></li>
                            <li><li><a class="dropdown-item" href="main.php?cmd=sms">SMS</a></li>
                            
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