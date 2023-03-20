<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="board.css">
    </head>
    <body>
        <div class = "board">
            <h1> &#128059; 글수정 &#128059; </h1>
            <?php
            
            include "db.php";

            // 보여줄 글의 idx
            $idx = $_GET['idx'];
            $cp = $_GET['cp'];

            // 글 조회
            $sql = "select * from board 
                    where idx = $idx";
            $res = mysqli_query($db, $sql);

            //결과 얻기
            $row = mysqli_fetch_array($res);
            ?>
            <form name = "mod" action="mod_proc.php" method="post">
                <input type="hidden" name ="idx" value="<?=$idx?>">
                <input type="hidden" name ="cp" value="<?=$cp?>">
            <table style = "width: 500px;">
                <tr>
                    <th class = "id">ID:</th>
                    <td><input class = "userid" type = "text" name = "userid" value = "<?=$row['userid']?>" readonly> </td>
                </tr>
                <tr>
                    <th class = "title"> 제목: </th>
                    <td> <input class = "title1" type = "text" name = "title" value = "<?=$row['title']?>"></td>
                </tr>
                <tr>
                    <th class= "c"> 내용: </th>
                    <td><textarea class = "c1" name = "content" cols = "50" rows = "20"><?=$row['content']?></textarea></td>
                </tr>
                <tr>
                    <th> </th>
                    <td class = b>
                        <input class="b1" type="submit" style = "border: none" value ="수정"> 
                    </td>
                    <td class = l>
                    <button class = "l1"  style = "border: none" type="button" onclick="location.href= 'javascript:history.go(-1);' "> 취소 </button>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </body>
</html>