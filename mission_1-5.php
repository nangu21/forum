<html>
  <form action="mission_1-5.php" method="post">
  <input type="text" name="comment" value="コメント">
  <input type="submit" value="送信">
  </form>
 </html>

<?php
  $filename='mission_1-5_Nangu.txt';
  
  if(!empty($_POST['comment'])){  //コメントフォームが空でないときのみ、txtに書き込み
 
  $fp=fopen($filename,'w');           //送られたコメントをtxtに書き込む
  fwrite($fp,$_POST['comment']);
  fclose($fp);

  file_get_contents($filename);    //書き込んだtxtを読み込み
   
  $a=$_POST['comment'];
  $b='完成！';
   
  if($a===$b){         //送られたコメント($a)が「完成！」($b)のときのみ、「おめでとう！」と表示する
   	   echo 'おめでとう！';
 	  }
 	   	  
 	 //$aが完成！以外のときは特に何もしなくていい。else{（空）}を書いても書かなくても結果は同じ。
 
?>

