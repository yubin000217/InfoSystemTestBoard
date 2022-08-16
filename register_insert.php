<?php
include("dbconn.php");

$pwd = trim($_POST['pwd']);
$pwd_re = trim($_POST['pwd_re']);
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$email = trim($_POST['email']);

$sql = "select * from member where id = '$id'"; //아이디 중복 확인
$result = mysqli_query($conn, $sql);

if(!$id) { //누락 정보 확인
    echo "<script>alert('아이디를 입력하세요.');</script>";
    echo "<script>location.replace('register.php');</script>";
    exit;
}
if(!$pwd) { //누락 정보 확인
    echo "<script>alert('비밀번호를 입력하세요.');</script>";
    echo "<script>location.replace('register.php');</script>";
    exit;
}
if(!$pwd_re) { //누락 정보 확인
    echo "<script>alert('비밀번호 확인을 입력하세요.');</script>";
    echo "<script>location.replace('register.php');</script>";
    exit;
}
if(!$name) { //누락 정보 확인
    echo "<script>alert('이름을 입력하세요.');</script>";
    echo "<script>location.replace('register.php');</script>";
    exit;
}if(!$email) { //누락 정보 확인
    echo "<script>alert('이메일을 입력하세요.');</script>";
    echo "<script>location.replace('register.php');</script>";
    exit;
}


if (mysqli_num_rows($result)>0) { //아이디 중복 확인
    echo "<script>alert('이미 사용중인 아이디입니다. ');</script>";
    echo "<script>location.replace('register.php');</script>";
    exit;
}

if($pwd != $pwd_re) { //비밀번호 확인
    echo "<script>alert('비밀번호를 정확히 두번 작성하세요.');</script>";
    echo "<script>location.replace('register.php');</script>";
    exit;
}
$sql = "insert into member
            Set id = '$id', pwd='$pwd', name='$name', email='$email'";
$result = mysqli_query($conn, $sql); 

if($result) {
    echo "<script>alert('회원가입이 완료되었습니다.');</script>";
    echo "<script>location.replace('login.php');</script>";
    exit;
}