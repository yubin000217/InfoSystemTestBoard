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
    <?php 
    include "dbconn.php";

    $user_id = "";
    if(isset($_SESSION["id"])) {
        $user_id = $_SESSION["id"];
    }

    $_SESSION["which_test"] = "실기";

    $_SESSION["board_type"] = "";
    ?>

    <script>
        <?php
            if ($_POST["search_board_type"] == "qa" ) ?> //전달받은 보드타입으로 박스 색칠하기, 변경 불가
                //document.getElementById('qa').style.backgroundColor="#e0f2f0";
        <?php
            if ($_POST["search_board_type"] == "review") ?>
                ///document.getElementById('review').style.backgroundColor="#e0f2f0";
        <?php
            if ($_POST["search_board_type"] == "info") ?>
                //document.getElementById('info').style.backgroundColor="#e0f2f0";
    </script>

    

    <h4 onclick="location.href='main.php'" style="margin-left:10px; margin-top:10px; margin-botton:0px; height:10px; padding:0px; float:left;">실기게시판</h4>
    <h4 onclick="location.href='login.php'" style="text-align:right; margin-right:10px; margin-top:10px; margin-bottom:0px; height:10px; padding:0px; float:right;" >
        <?php if(!$user_id) {?>로그인<?php } else { echo "<div id='user-name' >$user_id 님 환영합니다.</div>"; }?></h4>
    <br><br>
    <hr style="background-color: #fff; border-top: 2px dashed #008080;">
    <div style="display:flex; justify-content:center;">
        <div style="display:inline-block;">
            <div class="board_menu" id="qa" style="float:left;">Q&A</div> 
            <div class="board_menu" id="review" style="float:left;">후기</div>
            <div class="board_menu" id="info" style="float:left;">정보</div>
        </div>
    </div>
    <div style=" display:flex; justify-content:center;">
        <div style=" margin-top:30px; width:1250px;">
            <button class="new_content" onclick="location.href='new_content.php'">새 글 쓰기</button>
        </div>
    </div>
    <div style="display:flex; justify-content:center;"> <!-- 세부 게시판 정보에 따라 동적으로 후기 리스트 보여주기, 후기 제목 선택하면 후기 내용 보여주기 구현 필요 -->
        
        <table class="qa_table">
        <?php 

            $search_board_type = $_POST["search_board_type"];
            $search_input = $_POST["search_input"];
            
            $like_search_input = '%'.$search_input.'%';

            $search_sql = "select * from $search_board_type where title like $like_search_input order by num desc"; 
            $search_result = mysqli_query($conn, $search_sql);

            $total_search = mysqli_num_rows($search_result);

            if (!$total_search) { //찾는 후기가 없을 경우
                echo "<script>alert('찾는 정보가 없습니다.');</script>";
                echo "<script>history.go(-1);</script>";
            }

            $number = $total_search;
            for ($i = 0; $i<$total_search; $i++) {
                mysqli_data_seek($search_result, $i);
                $row = mysqli_fetch_assoc($search_result);

                $num = $row["num"];
                $id = $row["id"];
                $date = $row["date"];
                $title = $row["title"];
                ?>

                <tr class="table_row">
                    <td class="column1"><?=$title?></td> <td class="column2"><?=$date?></td> <td class="column3"><?=$id?></td>
                </tr>

                <?php
                $number--;
            }
            mysqli_close($conn);
            ?>
            
            </table>
</body>
</html> <!-- 일단 실기게시판 완료해놓기 필기게시판은 필요시에만 복붙해서 구현 -->