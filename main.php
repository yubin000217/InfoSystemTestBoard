<html>
    <head>
        <title>정보처리기사 게시판</title>
        <style>
            .main_button {
                height:400px;
                width:400px;
                background-color:#e0f2f0;
                border: 4px solid #008080;
                border-radius:50px;
                text-align:center;
                line-height:400px;
                font-size:40px;
                color:#008080;
                font-weight:bold;
                margin-top:100px;
            }
            .main_button:hover { 
                height:400px;
                width:400px;
                background-color:#e0f2f0;
                border: 4px solid #008080;
                border-radius:50px;
                text-align:center;
                line-height:400px;
                font-size:40px;
                color:#008080;
                font-weight:bold;
                margin-top:100px;
                box-shadow:1px 1px 10px #008080;
            }
            .main_button:active {
                height:400px;
                width:400px;
                background-color:#b2dfde;
                border: 4px solid #008080;
                border-radius:50px;
                text-align:center;
                line-height:400px;
                font-size:40px;
                color:#008080;
                font-weight:bold;
                margin-top:100px;
            }
            .login {
                text-align:right; margin-right:10px; margin-top:10px; margin-bottom:0px; height:10px; padding:0px; float:right;
            }

        </style>
    </head>
<body> 
    <?php //로그인 된 경우 회원 이름 띄우기 구현 필요
    session_start();
    $user_id = "";
    if(isset($_SESSION["id"])) {
        $user_id = $_SESSION["id"];
    }
    ?>

    <h4 style="margin-left:10px; margin-top:10px; margin-botton:0px; height:10px; padding:0px; float:left;">정보처리기사 게시판</h4>
    <h4 onclick="location.href='login.php'" class="login" >
        <?php if(!$user_id) {?>로그인<?php } else { echo "<div id='user-name' >$user_id 님 환영합니다.</div>"; }?></h4>
    <br><br>
    <hr style="background-color: #fff; border-top: 2px dashed #008080;">
    <div style="height:600px; ">
        <div class="main_button" onclick="location.href='about_1st_test.php'" style="float:left; margin-left:200px; margin-right:100px;">필기</div>
        <div class="main_button" onclick="location.href='about_2nd_test.php'" style="float:right; margin-left:100px; margin-right:200px;">실기</div>
    </div>
</body>
</html>