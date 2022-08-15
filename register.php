<?php
include("dbconn.php");

$title = "회원가입";
$href = "main.php";
?>

<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
    <div class="container">
        <h4 class="display-4 text-center"><?php echo $title ?></h4>

        <form action="register_insert.php" method="post">
            <label for="id">아이디</label>
            <div class="mb-3">
                <input type="text" id="id" name="id" class="form-control">
            </div>

            <label for="pwd">비밀번호</label>
            <div class="mb-3">
                <input type="text" id="pwd" name="pwd" class="form-control">
            </div>

            <label for="pwd_re">비밀번호 확인</label>
            <div class="mb-3">
                <input type="text" id="pwd_re" name="pwd_re" class="form-control">
            </div>

            <label for="name">이름</label>
            <div class="mb-3">
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <label for="email">이메일</label>
            <div class="mb-3">
                <input type="text" id="email" name="email" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">회원가입</button>
            <a href="<?php echo $href ?>" class="btn btn-danger">취소</a>
        </form>
    </div>

</body>

</html>