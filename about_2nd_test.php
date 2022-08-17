<html>
    <head>
        <title>실기 게시판</title>
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
                cursor:pointer;
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
                cursor:pointer;
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
                cursor:pointer;
            }

            .search_input {
                margin-top:50px;
                width:1100px;
                height:40px;
                float:left;
            }
            .search_button {
                float:left; width:150px; height:40px; margin-top:50px; background-color:#e0f2f0;
                border: 2px solid #008080;
                font-weight:bold;
                font-size:15px;
            }
            .search_button:active {
                float:left; width:150px; height:40px; margin-top:50px; background-color:#b2dfde;
                border: 1.5px solid #008080;
                font-weight:bold;
            }
            .new_content {
                float:right; width:300px; height:60px; background-color:#e0f2f0;
                border: 2px solid #008080;
                font-weight:bold;
                font-size:15px;
            }
            .new_content:active {
                float:right; width:300px; height:60px; background-color:#b2dfde;
                border: 2px solid #008080;
                font-weight:bold;
                flex:right;
            }
            .qa_table {
                margin-top:40px;
                /* border: 1px solid black; */
            }
            td {
                border-bottom: 1px dotted black;
                height:80px;
            }
            .column1 {
                font-weight:bold;
                width:980px;
                padding-left:20px;
                font-size:20px;
            }
            .column2 {
                width:100px;
                text-align:center;
                font-size:15px;
                border-left:1px dotted black;
            }
            .column3 {
                width:150px;
                text-align:center;
                font-size:15px;
                border-left:1px dotted black;
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

    $_SESSION["which_test"] = "실기";
    ?>

    <script>
        function qa_clicked() {
            var element = document.getElementById('qa');
            element.style.backgroundColor="#e0f2f0"
            document.getElementById('review').style.backgroundColor="white";
            document.getElementById('info').style.backgroundColor="white";
            <?php
                $_SESSION["board_type"] = "qa";
                ?>
        }
        function review_clicked() {
            <?php
                $_SESSION["board_type"] = "review";
                ?>
            var element = document.getElementById('review');
            element.style.backgroundColor="#e0f2f0"
            document.getElementById('qa').style.backgroundColor="white";
            document.getElementById('info').style.backgroundColor="white";
        }
        function info_clicked() {
            <?php
                $_SESSION["board_type"] = "info";
                ?>
            var element = document.getElementById('info');
            element.style.backgroundColor="#e0f2f0"
            document.getElementById('review').style.backgroundColor="white";
            document.getElementById('qa').style.backgroundColor="white";
        }
    </script>

    <h4 onclick="location.href='main.php'" style="margin-left:10px; margin-top:10px; margin-botton:0px; height:10px; padding:0px; float:left;">실기 게시판</h4>
    <h4 onclick="location.href='login.php'" style="text-align:right; margin-right:10px; margin-top:10px; margin-bottom:0px; height:10px; padding:0px; float:right;" >
        <?php if(!$user_id) {?>로그인<?php } else { echo "<div id='user-name' >$user_id 님 환영합니다.</div>"; }?></h4>
    <br><br>
    <hr style="background-color: #fff; border-top: 2px dashed #008080;">
    <div style="display:flex; justify-content:center;">
        <div style="display:inline-block;">
            <div class="board_menu" id="qa" onclick='qa_clicked()' style="float:left;">Q&A</div> <!-- 내가 있는 게시판 백그라운드 칠하기 구현 필요 -->
            <div class="board_menu" id="review" onclick='review_clicked()' style="float:left;">후기</div>
            <div class="board_menu" id="info" onclick='info_clicked()' style="float:left;">정보</div>
        </div>
    </div>
    <div style="display:flex; justify-content:center;">
        <input class="search_input">
        <button class="search_button">찾아보기</button>
    </div>
    <div style=" display:flex; justify-content:center;">
        <div style=" margin-top:30px; width:1250px;">
            <button class="new_content" onclick="location.href='new_content.php'">새 글 쓰기</button>
        </div>
    </div>
    <div style="display:flex; justify-content:center;">
        <table class="qa_table">
            <tr class="table_row">
                <td class="column1">후기</td> <td class="column2">2022.08.17</td> <td class="column3">yu</td>
            </tr>
            <tr class="table_row">
                <td class="column1">후기</td> <td class="column2">2022.08.17</td> <td class="column3">yu</td>
            </tr>
            <tr class="table_row">
                <td class="column1">후기</td> <td class="column2">2022.08.17</td> <td class="column3">yu</td>
            </tr>
        </table>
    </div><br><br><br><br>
    <div style="display:flex; justify-content:center;"> <!-- 후기 한페이지에 10개, 넘어갈 때 페이지 구현 필요 -->
        <div style="border-bottom: 1px solid black; height:25px; width:20px;text-align:center;font-size:15px;">1</div>
    </div>
</body>
</html>