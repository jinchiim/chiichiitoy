<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="del_form.css">
    </head>
    <body>
        <div class = "board">
            <h1> &#128276; 글을 삭제하실 건가요?  &#128276; </h1>
            <?php
            $idx = $_REQUEST['idx'];
            ?>
            <form name = "del" action="del_proc.php" method="post">
                <input type ="hidden" name = "idx" value ="<?=$idx?>">
            <table>
                <tr>
                    <td>
                        <input class = "s" type = "submit", value = "삭제">
                        <a href = "javascript:history.go(-1);"><input class = "s1" type="button" value ="취소"> </a>
                    </td>
                </tr>
            </table>
            </form>
         </div>
    </body>
</html>