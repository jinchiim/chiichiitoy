<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php
    // DB 설정 파일 포함 
    include "db.php";

    //입력 데이터 가져오기
    $userid = $_REQUEST['userid'];
    $passwd = $_REQUEST['passwd'];

    //DB에 사용자 확인
    $sql = "select * from eu_user where userid = '$userid' and passwd = password('$passwd') ";
    $res = mysqli_query($db, $sql);
    if( mysqli_num_rows($res) > 0) {
        //회원 인증 성공
        $row = mysqli_fetch_array($res);
        echo "<script>alert('{$row['name']}님 환영합니다.');</script>";

        $_SESSION['userid'] = $row['userid'];
        $_SESSION['name'] = $row['name'];
        mysqli_close($db);
        echo '<script>location.href = "board_list.php";</script>';

    } else {    
        echo "<script>alert('아이디 또는 비밀번호가 일치하지 않습니다..');</script>";
        echo '<script>location.href = "login.html";</script>';
        mysqli_close($db);}
    ?>
    </body>
</html>