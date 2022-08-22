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
    include "dbconn.php";

    $user_id = "";
    if(isset($_SESSION["id"])) {
        $user_id = $_SESSION["id"];
    }

    $_SESSION["which_test"] = "실기";

    $_SESSION["board_type"] = "";
    ?>

    <script>
        function qa_clicked() {
            var element = document.getElementById('qa');
            element.style.backgroundColor="#e0f2f0"
            document.getElementById('review').style.backgroundColor="white"; //선택한 박스 색 칠하기
            document.getElementById('info').style.backgroundColor="white";
            sessionStorage.setItem('board_type', 'qa');
            var url = "about_2nd_test.php?board_type=qa"; //get으로 쿼리스트링으로 js에서 php로 변수 이동시킴
            location.href=url;
            document.getElementById('search_board_type').value = "qa"; //찾아보기 구현 위해서 히든 인풋값 설정
        }
        function review_clicked() {
            var element = document.getElementById('review');
            element.style.backgroundColor="#e0f2f0"
            document.getElementById('qa').style.backgroundColor="white";
            document.getElementById('info').style.backgroundColor="white";
            sessionStorage.setItem('board_type', 'review');
            var url = "about_2nd_test.php?board_type=review";
            location.href=url;
            document.getElementById('search_board_type').value = "review";
        }
        function info_clicked() {
            var element = document.getElementById('info');
            element.style.backgroundColor="#e0f2f0"
            document.getElementById('review').style.backgroundColor="white";
            document.getElementById('qa').style.backgroundColor="white";
            sessionStorage.setItem('board_type', 'info');
            var url = "about_2nd_test.php?board_type=info";
            location.href=url;
            document.getElementById('search_board_type').value = "info";
        }

        function check_search_input() {
            if(!document.search.search_input.value) {
                alert("내용을 입력하세요");
                document.search.search_input.focus();
                return;
            }
            if(!document.search.search_board_type.value) {
                alert("종류를 선택하세요");
                document.search.search_input.focus();
                return;
            }
            document.search.submit();
        }
    </script>

    <h4 onclick="location.href='main.php'" style="margin-left:10px; margin-top:10px; margin-botton:0px; height:10px; padding:0px; float:left;">실기게시판</h4>
    <h4 onclick="location.href='login.php'" style="text-align:right; margin-right:10px; margin-top:10px; margin-bottom:0px; height:10px; padding:0px; float:right;" >
        <?php if(!$user_id) {?>로그인<?php } else { echo "<div id='user-name' >$user_id 님 환영합니다.</div>"; }?></h4>
    <br><br>
    <hr style="background-color: #fff; border-top: 2px dashed #008080;">
    <div style="display:flex; justify-content:center;">
        <div style="display:inline-block;">
            <div class="board_menu" id="qa" onclick='qa_clicked()' style="float:left;">Q&A</div> 
            <div class="board_menu" id="review" onclick='review_clicked()' style="float:left;">후기</div>
            <div class="board_menu" id="info" onclick='info_clicked()' style="float:left;">정보</div>
        </div>
    </div>
    <div style="display:flex; justify-content:center;">
        <form name="search" method="post" action="search_content.php">
            <input type="hidden" class="search_board_type" name="search_board_type" id="search_board_type" value="" placeholder="찾고싶은 후기의 제목을 입력하세요">
            <input class="search_input" name="search_input"> <!-- 찾아보기 인풋에서 후기 제목 정확히 쓰면 해당 후기만 보여주기 선택한 게시판에서만 해당, 선택 안했을 땐 alert 띄우기 -->
            <button class="search_button" name="search_button" onclick="check_search_input()">찾아보기</button> <!-- 부분만 써도 후기 보여주기까지 구현? like %후기 로 구현할 수 있을듯? -->
        </form>
    </div>
    <div style=" display:flex; justify-content:center;">
        <div style=" margin-top:30px; width:1250px;">
            <button class="new_content" onclick="location.href='new_content.php'">새 글 쓰기</button>
        </div>
    </div>
    <div style="display:flex; justify-content:center;"> <!-- 세부 게시판 정보에 따라 동적으로 후기 리스트 보여주기, 후기 제목 선택하면 후기 내용 보여주기 구현 필요 -->
        
        <table class="qa_table">
        <?php 
            if (isset($_GET["page"])) 
                $page = $_GET["page"];
            else 
                $page = 1;

            if (isset($_GET["board_type"])) //일단 qa테이블이 디폴트, 직접 박스 클릭 안하면 get으로 보낼 수 없음, alert 설정 필요
                $get_board_type = $_GET['board_type'];
            else 
                $get_board_type = "qa";
            
            $list_sql = "select * from $get_board_type order by num desc"; 
            $list_result = mysqli_query($conn, $list_sql);

            $total_list = mysqli_num_rows($list_result);

            $scale = 10;

            if ($total_list % $scale ==0) 
                $total_page = floor($total_list/$scale);
            else 
                $total_page = floor($total_list/$scale) +1;

            $start = (intval($page)-1)*$scale;

            $number = $total_list - $start;
            for ($i = $start; $i<$start+$scale && $i<$total_list; $i++) {
                mysqli_data_seek($list_result, $i);
                $row = mysqli_fetch_assoc($list_result);

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
    </div><br><br><br><br>
    <div style="display:flex; justify-content:center;"> <!-- 후기 한페이지에 10개, 넘어갈 때 페이지 구현 -->
        <?php 
            for ($i=1; $i<=$total_page; $i++) {
                if ($page == $i) {
                    $new_url = "about_2nd_test.php";
                    echo "<div style='border-bottom: 1px solid black; height:25px; width:20px;text-align:center;font-size:15px;'>$i</div>";
                }
                else {
                    $new_url = "about_2nd_test.php"."?board_type=$get_board_type"."&page=$i";
                    echo "<a style='border-bottom: 1px solid black; height:25px; width:20px;text-align:center;font-size:15px;' href='$new_url'>$i</a>";
                }
            }
        ?>
        <!-- <div style="border-bottom: 1px solid black; height:25px; width:20px;text-align:center;font-size:15px;">1</div> -->
    </div>
</body>
</html> <!-- 일단 실기게시판 완료해놓기 필기게시판은 필요시에만 복붙해서 구현 -->