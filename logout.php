<?php
session_start();
session_unset();
session_destroy();

if(!isset($_SESSION["id"])) {
    echo "<script>alert('로그아웃되었습니다. ');</script>";
    echo "<script>location.replace('main.php');</script>";
    exit;
}