<?php
    $title = $_POST["title"];
    $content = $_POST["content"];

    include("dbconn.php");

    $id = $_SESSION["id"];
    $date = date("Y-m-d");

    $board_type = $_SESSION["board_type"];

    $sql = "insert into $board_type (title, content, id, date) values('$title', '$content', '$id', '$date')";

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    echo "<script> history.go(-2); </script>";