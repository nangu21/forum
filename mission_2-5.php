<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>



<?php
$filename='mission_2-5_nangu.txt';
touch($filename);

if(!empty($_POST['name'])){
  $name=$_POST['name'];
}
if(!empty($_POST['comment'])){
  $comment=$_POST['comment'];
}

 //パス受け取り
 if(!empty($_POST["pass"])){
    $pass=$_POST["pass"];
}
        
$time=date("Y年m月d日 G:i:s");
$num=count(file($filename))+1;
if(!empty($name) && !empty($comment) && !empty($pass)){
  $contents = $num."<>".$name."<>".$comment."<>".$time."<>".$pass."<>";
}
    

//通常の送信ボタン
if(!empty($name) && !empty($comment) && empty($_POST["editcon"]) && !empty($pass)){  
    $fp=fopen($filename,'a');
    fwrite($fp,$contents."\n");
    fclose($fp);
  }
  

//編集実行ボタン
if(!empty($_POST['editcon'])){
  $editcon = $_POST['editcon'];
  $newname = $_POST['name'];
  $newcom = $_POST['comment'];
  $file = file($filename);

  $fp = fopen($filename, 'r+');
   ftruncate($fp, 0);

  foreach($file as $val){
    $content = explode("<>", $val);
    if($content[0] != $editcon){
      $fp = fopen($filename, 'a');
      fwrite($fp, $val);
      fclose($fp); 
    }else{
      $fp = fopen($filename, 'a');
      fwrite($fp, $content[0]."<>".$newname."<>".$newcom."<>".$content[3]);
      fclose($fp);
    }
  }
}

$file=file($filename); //ファイルで配列化

//編集番号が選択されたとき
if(!empty($_POST["editnum"]) && !empty($_POST["edipass"])){
  $editnum=$_POST["editnum"];
  $edipass=$_POST["edipass"];
   
   foreach($file as $val){
    $content=explode("<>",$val);
    
    if($content[4] == $edipass){
      
      if($content[0] == $editnum){
        $sample = explode("<>",$val);
      }
      }
      
//編集番号が違ったとき
   if($content[0] == $editnum && $content[4] != $edipass){
   echo "パスワードが違います"."<br />";
}
}
}

//削除ボタン
  if(!empty($_POST["delete"]) && !empty($_POST["delpass"])){
   $delete = $_POST["delete"];
   $delpass=$_POST["delpass"];
   
    foreach($file as $val){
    $content = explode("<>", $val);
        
   if($content[4] == $delpass){ //pass比較
   $fp = fopen($filename, 'r+');
   ftruncate($fp, 0);
   
    foreach($file as $val){
    $content = explode("<>", $val);
     if($content[0] != $delete){ //削除行以外を書き込み
      $fp = fopen($filename, 'a');
      fwrite($fp, $val);
      fclose($fp); 
     }
   }
   }
   if($content[0] == $delete && $content[4] != $delpass){
    echo "パスワードが違います"."<br />";
   }
   }
   }

?>
<form action="mission_2-5.php"method="post">
<input type="text" name="name" placeholder="名前" value=<?php if(!empty($sample) && $sample[0]==$editnum){echo $sample[1];}?>><br />
<input type="text" name="comment" placeholder="コメント" value=<?php if(!empty($sample) && $sample[0]==$editnum){echo $sample[2];}?>><br />
<input type="text" name="pass" placeholder="パスワード">
<input type="hidden" name="editcon" value=<?php if(!empty($sample) && $sample[0]==$editnum){echo $editnum[0];}?>>
<input type="submit" value="送信">
<br />
<br />
<input type="text"name="delete"placeholder="削除対象番号"><br />
<input type="text" name="delpass" placeholder="パスワード">
<input type="submit"value="削除">
<br />
<br />
<input type="text"name="editnum"placeholder="編集対象番号"><br />
<input type="text" name="edipass" placeholder="パスワード">
<input type="submit"value="編集"></form>

<?php

  $file=file($filename);

//ブラウザ表示
foreach($file as $val){
   $content=explode("<>",$val);

    echo $content[0]."";
    echo $content[1]."";
    echo $content[2]."";
    echo $content[3].""."<br>";
  
}
?>

</body>
</html>