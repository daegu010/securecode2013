<?php
    $name = $_SESSION["sessname"];
    session_destroy();
    echo "
    <script>
        alert('$name 님 안녕히가세요');
        location.href='main.php';
    </script>
    ";
?>