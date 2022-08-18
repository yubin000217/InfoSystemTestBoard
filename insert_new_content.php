<!-- <script>
    var board_type = sessionStorage.getItem("board_type");
    console.log('data', board_type);
    <?php
        /* $title = $_POST["title"];
        $content = $_POST["content"];

        include("dbconn.php");

        $id = $_SESSION["id"];
        $date = date("Y-m-d");

        //$board_type = '<script>document.write(board_type)</script>';
        $board_type = $_SESSION["board_type"];

        $sql = "insert into $board_type (title, content, id, date) values('$title', '$content', '$id', '$date')";

        mysqli_query($conn, $sql);

        mysqli_close($conn); */

        //$_SESSION["board_type"] = "";

        //echo "<script> history.go(-2); </script>";
    ?>
    history.go(-2);
</script> -->
<?php
        $title = $_POST["title"];
        $content = $_POST["content"];
        $board_type = $_POST["board_type"];

        include("dbconn.php");

        $id = $_SESSION["id"];
        $date = date("Y-m-d");

        //$board_type = '<script>document.write(board_type)</script>';
        //$board_type = $_SESSION["board_type"];

        $sql = "insert into $board_type (title, content, id, date) values('$title', '$content', '$id', '$date')";

        mysqli_query($conn, $sql);

        mysqli_close($conn);

        //$_SESSION["board_type"] = "";

        echo "<script> history.go(-2); </script>";
    ?>