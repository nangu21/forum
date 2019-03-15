<html>
  <form action="mission_1-6.php" method="post">
  <input type="text" name="comment" value="コメント">
  <input type="submit" value="送信">
  </form>
 </html>

<?php
  $filename='mission_1-6_Nangu.txt';
  
//フォームが空欄でないときのみテキストファイルに書込されるようにする
 if(!empty($_POST['comment'])){
    
//テキストファイルを追記保存
  $fp=fopen($filename,'a');
  fwrite($fp,$_POST['comment'].PHP_EOL);
  fclose($fp);
  
//ファイル読込
  $content=file_get_contents($filename);
 
}
?>