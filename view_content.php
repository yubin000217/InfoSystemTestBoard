<html>
    <head>
        <title>정보처리기사 필기</title>
        <style>
            .board_menu {
                width:450px;
                height:80px;

                border-bottom: 3px solid #008080;
                border-left: 1.5px solid #008080;
                border-right: 1.5px solid #008080;
                text-align:center;
                line-height:80px;
                font-size:20px;
                color:#008080;
                font-weight:bold;
                margin-top:50px;
            }
            .board_menu:hover {
                width:450px;
                height:80px;
                background-color:#e0f2f0;
                border-bottom: 3px solid #008080;
                border-left: 1.5px solid #008080;
                border-right: 1.5px solid #008080;
                text-align:center;
                line-height:80px;
                font-size:20px;
                color:#008080;
                font-weight:bold;
                margin-top:50px;
            }
            .board_menu:active {
                width:450px;
                height:80px;
                background-color:#b2dfde;
                border-bottom: 3px solid #008080;
                border-left: 1.5px solid #008080;
                border-right: 1.5px solid #008080;
                text-align:center;
                line-height:80px;
                font-size:20px;
                color:#008080;
                font-weight:bold;
                margin-top:50px;
            }
            .title_input {
                margin-top:50px;
                width:950px;
                height:38px;
                float:left;
                padding-left:20px;
                border: 1px solid black;
                line-height:38px;
            }
            .user {
                float:left; width:150px; height:40px; margin-top:50px;
                border: 2px solid #008080;
                font-weight:bold;
                font-size:15px;
            }
            .written_date {
                float:left; width:150px; height:36px; margin-top:50px;
                border: 2px solid #008080;
                font-weight:bold;
                font-size:15px;
                line-height:36px;
                text-align:center;
            }
            .content_input {
                width:1250px;
                margin-top:50px;
                height:500px;
                padding-left:20px;
                border: 1px solid black;
                line-height:40px;
            }
        </style>
        <script>
        function color_board_type_box() {
            if (sessionStorage.getItem(['board_type']) == "qa" )  //세션에 보드타입으로 박스 색칠하기, 변경 불가
                document.getElementById('qa').style.backgroundColor="#e0f2f0";
            if (sessionStorage.getItem(['board_type']) == "review") 
                document.getElementById('review').style.backgroundColor="#e0f2f0";
            if (sessionStorage.getItem(['board_type']) == "info") 
                document.getElementById('info').style.backgroundColor="#e0f2f0";
        }
        
    </script>
    </head>
<body onload="color_board_type_box()"> 
    <?php //로그인 된 경우 회원 이름 띄우기 구현 필요
    session_start();
    $user_id = "";
    if(isset($_SESSION["id"])) {
        $user_id = $_SESSION["id"];
    }

    $title = $_POST["content_title"];
    $content = $_POST["content_content"];
    $date = $_POST["content_date"];
    $id = $_POST["content_id"];

    ?>

    <h4 onclick="location.href='main.php'" style="margin-left:10px; margin-top:10px; margin-botton:0px; height:10px; padding:0px; float:left;">정보처리기사 필기 게시판</h4>
    <h4 onclick="location.href='login.php'" style="text-align:right; margin-right:10px; margin-top:10px; margin-bottom:0px; height:10px; padding:0px; float:right;" >
        <?php if(!$user_id) {?>로그인<?php } else { echo "<div id='user-name' >$user_id 님 환영합니다.</div>"; }?></h4>
    <br><br>
    <hr style="background-color: #fff; border-top: 2px dashed #008080;">
    <div style="display:flex; justify-content:center;">
        <div style="display:inline-block;">
            <div class="board_menu" id="qa" style="float:left;">Q&A</div> <!-- 내가 있는 게시판 백그라운드 칠하기 구현 필요 -->
            <div class="board_menu" id="review" style="float:left;">후기</div>
            <div class="board_menu" id="info" style="float:left;">정보</div>
        </div>
    </div>
    <div style="display:flex; justify-content:center;">
        <div class="title_input" ><?=$title?></div> 
        <div class="written_date"><?=$date?></div>
        <button class="user"><?=$id?></button> <!-- 제목 옆에 유저 아이디 보여주기 -->
    </div>
    <div style=" display:flex; justify-content:center;">
        <div class="content_input" ><?=$content?></div>
    </div>
</body>
</html>