<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="board_view.css">
    </head>
    
    <body>
        <div class = "board">

            <h1> &#128059; 글 보기 &#128059;</h1>
            
            <?php
            include "db.php";

            // 보여줄 글의 idx
            $idx = $_GET['idx'];
            $cp = $_GET['cp'];

            // 글 조회
            $sql = "select * from board where idx = $idx";
            $res = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($res);


            //결과
            ?>
            <?php
            if($_SESSION['userid'] != $row['userid']){ 
                $hit = $row['hit'] += 1;

                $update = "UPDATE board SET hit = $hit where idx = $idx";
                mysqli_query($db, $update); }
            else{
            }?>

            <table class = "table" style = "width: 700px;">
            <tr class = "name">
                <th style = "width: 10%"> 작성자 </th>
                <td style = "width: 15%"><?=$row['userid']?></td>
                <th> 작성일 </th>
                <td style = "width: 20%"><?=$row['reg_date']?></td>
                <th style = "width: 10%"> 조회 </th>
                <td><?=$row['hit']?></td>
            </tr>
            <tr class = "title">
                <th> 제목 </th>
                <td colspan="5"><?=$row['title']?></td>
            </tr>
            <tr class = "content">
                <th> 내용 </th>
                <td colspan="5"><?=nl2br($row['content'])?></td>
            </tr>
            </table>
            <table style = "width: 700px;" >
            <tr>
                <td style = "text-align: center;">
                <?php if($_SESSION['userid']==$row['userid']){ ?> 
                    <button class = "b" type="button" onclick="location.href= 'mod_form.php?idx=<?=$idx?>&cp=<?=$cp?>'"> 수정 </button>
                    <button class = "b1" type="button" onclick="location.href= 'del_form.php?idx=<?=$idx?>' "> 삭제 </button>
                    </td>
                <?php };?>
            </tr>
            <tr>
                <td style = "text-align: center;">
                <button class = "b2" type="button" onclick="location.href= 'board_list.php?cp=<?=$cp?>' "> 목록 </button>
            </td>
            </tr>
            </table>

            <?php
            mysqli_close($db);
            ?>
        </div>
    </body>
</html>