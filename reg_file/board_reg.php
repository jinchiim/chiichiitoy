<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php

    include "db.php";
    //입력 데이터 가져오기
    $userid = $_REQUEST['userid'];
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];

    //테이블에 추가

    if ($title == null or $content == null){
        echo "<script>alert('제목과 내용 입력은 필수 입니다.'); history.go(-1); </script>";
    }
    else{
        $sql = "insert into board values(null, '$userid', '$title', '$content', 0, now(), '')";
        $res = mysqli_query($db, $sql);
        if ($res) {
            echo "<script>alert('글이 등록되었습니다.');</script>";
        } else {
            echo "<script>alert('글 등록에 실패했습니다.'); history.go(-1); </script>";
        }
    }
    
    mysqli_close($db);
    echo '<script>location.href = "board_list.php"; </script>';
    ?>
    </body>
</html>