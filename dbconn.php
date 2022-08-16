<?php
    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_pwd = "1234";
    $mysql_db = "infosystemtestboard";

    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pwd, $mysql_db);

    if (!$conn) {
        die("데이터베이스 연결 실패: " . mysqli_connect_error());
    }

    session_start();