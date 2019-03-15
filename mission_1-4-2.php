<html>
<form action="mission_1-4-2.php" method="post">
<input type="text" name="comment" value="コメント">
<input type="submit" value="送信">
</form>
</html>

<?php
echo "ご入力ありがとうございます。<br>".date("Y年m月d日H時i分s秒")."に".$_POST["comment"]."を受け付けました";
?>
