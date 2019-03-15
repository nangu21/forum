<!DOCTYPE_html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<form action="mission_1-7.php" method="post">
<input type="text" name="comment" value="コメント">
<input type="submit" value="送信">
</form>

<?php
  $filename='mission_1-7_Nangu.txt';
 //条件分岐
  if(!empty($_POST['comment'])){
  	//フォームを追記保存
  	 $fp=fopen($filename,'a');
  	 fwrite($fp,$_POST['comment'].PHP_EOL);
  	 fclose($fp);
    //ファイルの読み込み＋配列
     $contents=file($filename);
     array($contents);
     
         //1-7-1:ブラウザに表示
         //echo $contents[0],"<br />";
         //echo $contents[1],"<br />";
         //echo $contents[2];   
       
         //1-7-2:繰り返し処理
         foreach($contents as $comments){
            echo $comments,"<br />";
         }
         
    }
?>

</body>
</html>