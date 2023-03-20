<?php
// mysql 접속
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
?>