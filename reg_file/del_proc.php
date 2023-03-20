<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php

    include "db.php";
    //입력 데이터 가져오기
    $idx = $_REQUEST['idx'];

    // 레코드 수정
    $sql = "delete from board where idx = $idx ";
    $res = mysqli_query($db, $sql);
    if ($res) {
        echo "<script>alert('글이 삭제되었습니다..');</script>";
    } else {
        echo "<script>alert('취소');</script>";
    }
    mysqli_close($db);
    echo("<script>location.href='board_list.php'; </script>");
    ?>
    </body>
</html>