<?php
session_start();

$_SESSION["id"] = "";

if(!isset($_SESSION["id"])) {
    echo "<script>alert('로그아웃되었습니다. ');</script>";
    echo "<script>location.replace('main.php');</script>";
    exit;
}