<?php
include("dbconn.php");

$id = trim($_POST["id"]); //trim 함수는 문자열 앞뒤 공백 제거용도
$pwd = trim($_POST["pwd"]);

if (!$id || !$pwd) {
    echo "<script>alert('아이디나 비밀번호가 공백이면 안됩니다.');</script>";
    echo "<script>location.replace('login.php');</script>";
    exit;
}

$sql = "select * from member where id='$id'";
$result = mysqli_query($conn, $sql);
$mb = mysqli_fetch_assoc($result); //배열로 저장

if (!$mb['id']) {
    echo "<script>alert('가입된 회원 아이디가 아닙니다. ');</script>";
    echo "<script>location.replace('login.php');</script>";
    exit;
}
if($pwd != $mb["pwd"]) {
    echo "<script>alert('비밀번호가 틀립니다. ');</script>";
    echo "<script>location.replace('login.php');</script>";
    exit;
}

$_SESSION["id"] = $id;

mysqli_close($conn);

if(isset($_SESSION["id"])) {
    echo "<script>alert('로그인 되었습니다. ');</script>";
    echo "<script>location.replace('main.php');</script>";
    exit;
}