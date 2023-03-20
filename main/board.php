<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="board.css">
    </head>
    <body>
        <div class = "board">
    `        <h1> &#128059; 글쓰기 &#128059; </h1>
            <form name = "board" action="board_reg.php" method="post">
            <table style = "width: 500px;">
                <tr>
                    <th class = "id">ID: </th>
                    <td><input class = "userid" style = "border: none" type = "text" name = "userid" value = "<?=$_SESSION['userid']?>" readonly > </td>
                </tr>
                <tr>
                    <th class = "title"> 제목: </th>
                    <td> <input class = "title1" style = "border: none" type = "text" name = "title" style = "width: 100%"></td>
                </tr>
                <tr>
                    <th class = "c"> 내용: </th>
                    <td><textarea class = "c1" style = "border: none" name = "content" cols = "50" rows = "20" style = "width: 100%"></textarea></td>
                </tr>
                <tr>
                    <th> </th>
                    <td class= "b"><input class="b1" style = "border: none" type="submit" value ="작성">  </td>
                    <button class = "b2" type="button" style = "border: none" onclick="location.href= 'javascript:history.go(-1);' "> 취소 </button>
                    
                </tr>
            </table>
            </form>`
        </div>
    </body>
</html>