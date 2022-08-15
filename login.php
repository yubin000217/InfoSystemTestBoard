<?php
include("dbconn.php");
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="login_style.css">
</head>

<body>
    <div class="container">
        <h4 class="display-4 text-center">로그인</h4>
        <form action="login_check.php" method="post">
            <div class="mb-3">
                <label for="id">아이디</label>
                <input type="text" id="id" name="id" class="form-control">
            </div>
            <div class="mb-3">
                <label for="pwd">비밀번호</label>
                <input type="password" id="pwd" name="pwd" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">로그인</button>
            <a href="register.php" class="btn btn-secondary">회원가입</a>
        </form>
    </div>
    
</body>
</html>