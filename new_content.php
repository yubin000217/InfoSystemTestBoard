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
                width:1100px;
                height:40px;
                float:left;
                padding-left:20px;
            }
            .user {
                float:left; width:150px; height:40px; margin-top:50px;
                border: 2px solid #008080;
                font-weight:bold;
                font-size:15px;
            }
            .content_input {
                width:1250px;
                margin-top:50px;
                height:500px;
                padding-left:20px;
            }
            .save_cancel {
                float:right; width:100px; height:60px; background-color:#e0f2f0;
                border: 2px solid #008080;
                font-weight:bold;
                font-size:15px;
            }
            .save_cancel:active {
                float:right; width:100px; height:60px; background-color:#b2dfde;
                border: 2px solid #008080;
                font-weight:bold;
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

    <script>
        function check_input() {
            if(!document.board_content.title.value) { //제목 및 내용 누락 확인
                alert("제목을 입력하세요");
                document.board_content.title.focus();
                return;
            }
            if(!document.board_content.content.value) {
                alert("내용을 입력하세요");
                document.board_content.content.focus();
                return;
            }
            document.board_content.submit();
        }
        function cancel() {
            history.go(-1);
        }
    </script>

    <h4 onclick="location.href='main.php'" style="margin-left:10px; margin-top:10px; margin-botton:0px; height:10px; padding:0px; float:left;">정보처리기사 필기 게시판</h4>
    <h4  onclick="location.href='login.php'" style="text-align:right; margin-right:10px; margin-top:10px; margin-bottom:0px; height:10px; padding:0px; float:right;" >
        <?php if(!$user_id) {?>로그인<?php } else { echo "<div id='user-name' >$user_id 님 환영합니다.</div>"; }?></h4>
    <br><br>
    <hr style="background-color: #fff; border-top: 2px dashed #008080;">
    <div style="display:flex; justify-content:center;">
        <div style="display:inline-block;">
            <div class="board_menu" style="float:left;">Q&A</div> <!-- 내가 있는 게시판 백그라운드 칠하기 구현 필요 -->
            <div class="board_menu" style="float:left;">후기</div>
            <div class="board_menu" style="float:left;">정보</div>
        </div>
    </div>
    <form name="board_content" method="post" action="insert_new_content.php">
        <div style="display:flex; justify-content:center;">
            <input class="title_input" name="title" placeholder="제목을 입력하세요"> <!-- 후기 제목 인풋 -->
            <button class="user"><?php echo "<div>$user_id</div>"; ?></button> <!-- 제목 옆에 유저 아이디 보여주기 -->
        </div>
        <div style=" display:flex; justify-content:center;">
            <input class="content_input" name="content" placeholder="내용을 입력하세요"> <!-- 후기 내용 인풋 -->
        </div>
        <div style=" display:flex; justify-content:center;">
            <div style=" margin-top:30px; width:1250px;">
                <button class="save_cancel" onclick="check_input()" style="margin-left:5px;">저장</button>
                <button class="save_cancel" onclick="cancel()" style="margin-right:5px;">취소</button>
            </div>
        </div>
    </form>
</body>
</html>