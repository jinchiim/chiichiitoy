<?php session_start(); 
        echo "userid: {$_SESSION['userid']} <br>";
        echo"name: {$_SESSION['name']} <br>"; ?>
<!DOCTYPE html>
<html>
    <head>
    <style>
        td{ text-align: center; }
    </style>
    </head>
    <body>
    <?php
    // DB 설정 파일 포함 
    include "db.php";

    //전체 글 개수 조회
    $sql = "select count(*) from board";
    $res = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($res);
    $total_rows = $row[0];

    //페이지 당 글의 수
    $rows_per_page = 10;
    // 전체 페이지 수
    $total_page = ceil($total_rows/$rows_per_page);
    // 현재 페이디 얻기
    $cur_page = $_GET['cp'];
    if( !$cur_page) $cur_page = 1;
    // 현재 페이지의 첫 글의 위치
    $start = $rows_per_page * ($cur_page - 1);

    //DB에 글 목록 조회
    $sql = "select idx,userid,title,reg_date,hit from board order by idx desc limit $start, $rows_per_page";
    $res = mysqli_query($db, $sql);
    # 결과 테이블의 행의 수 얻기
    $num_rows = mysqli_num_rows($res);
    ?>
    <table style = "width: 700px;">
    <tr>
        <th style = "width: 10%">번호</th>
        <th style = "width: 15%" >작성자</th>
        <th>제목</th>
        <th style = "width: 25%">작성일</th>
        <th style = "width: 10%">조회</th>
    </tr>
    <?php for( $i = 0 ;  $i < $num_rows ; $i++) {
        $row = mysqli_fetch_array($res);
    ?>
    <tr>
        <td><?=$row['idx']?> </td>
        <td><?=$row['userid']?> </td>
        <td style = "text-align: left;">
            <a href="board_view.php?idx=<?=$row['idx']?>&cp=<?=$cur_page?>"><?=$row['title']?></a>
        </td> 
        <td><?=$row['reg_date']?> </td>
        <td><?=$row['hit']?> </td>
    </tr>
    <?php } ?>
    </table>
    <?php
        $prev = $cur_page - 1;
        $next = $cur_page + 1;
    ?>
    <table style = "width: 700px;">
        <tr>
            <td style = "height:10px;" colspan = "3"></td>
        </tr>
        <tr>
            <td style = "width:15%; text-align:left;">
            <button type="button" onclick="location.href='board.html' ">글쓰기</button>
            <?php if( $prev > 0) {?> 
                <a href = "?cp=<?=$prev?>"> 이전</a>
            <? } ?>
            </td>
            <td> </td>
            <td style = "width:15%; text-align:right;">
            <?php if( $next <= $total_page) {?>
                <a href = "?cp=<?=$next?>"> 다음</a>
            <? } ?>
            </td>
        </tr>
    </table>
    <?php
    mysqli_close($db);
    ?>

    </body>
</html>