<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php

    include "db.php";
    //입력 데이터 가져오기

    $idx = $_REQUEST['idx'];
    $cp = $_GET['cp'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];

    // 레코드 수정
    $sql = "update board set title ='$title', content='$content'
            where idx = $idx ";
    $res = mysqli_query($db, $sql);
    if ($res) {
        echo "<script>alert('글이 수정되었습니다.');</script>";
    } else {
        echo "<script>alert('{$row['name']}님 환영합니다.');</script>";
    }
    mysqli_close($db);
    echo("<script>location.href='board_view.php?idx=$idx'; </script>");
    ?>
    </body>
</html>