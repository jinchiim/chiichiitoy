<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
    <?php
    $db = mysqli_connect('localhost', 'syaic18', 'syaic1818');
    if( !$db) {
        // 접속 오류
        echo "DBMS 접속에 오류가 발생했습니다.<br>";
        exit(0);
    }
    // 작업 db 선택
    if ( !mysqli_select_db($db, 'syaic18')) {
        //db 선택 오류
        echo "DB 선택에 오류가 발생했습니다.<br>";
        exit(0);
    }
    //입력 데이터 가져오기
    $userid = $_REQUEST['userid'];
    $passwd = $_REQUEST['passwd'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    //DB에 사용자 데이터 추가
    // 아이디 중복 확인
    $sql = "select * from eu_user where userid = '$userid' ";
    $res = mysqli_query($db, $sql);
    if( mysqli_num_rows($res) > 0) {
        echo "이미 사용중인 아이디 입니다.<br>";
        exit(0);
    }
    //테이블에 추가
    $sql = "insert into eu_user values('$userid',password('$passwd'), '$name', '$email', now() )";
    $res = mysqli_query($db, $sql);
    if ($res) {
        echo "회원가입을 축하합니다.<br>";
    } else {
        echo "회원 가입 오류입니다.<br>";
    }
    mysqli_close($db);
    ?>
    </body>
</html>