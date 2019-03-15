<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<form action="mission_2-4.php"method="post">
<body>



<?php
$filename='mission_2-4_nangu.txt';
touch($filename);

if(isset($_POST["name"])){
  $name=$_POST['name'];
}
if(isset($_POST['comment'])){
  $comment=$_POST['comment'];
}

$time=date("Y年m月d日 G:i:s");
$num=count(file($filename))+1;
if(!empty($name) && !empty($comment)){
  $contents = $num."<>".$name."<>".$comment."<>".$time;
}

//通常の送信ボタン
if(!empty($name) && !empty($comment) && empty($_POST["editcon"])){
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

$file=file($filename);
//ファイルで配列化

//編集ボタン
if(!empty($_POST["editnum"])){
  $editnum=$_POST['editnum'];
  // $fp=fopen($filename,'w');
  // ftruncate($fp,0);
  // fseek($fp,0);
  // fclose($fp);

  foreach($file as $val){
    $content=explode("<>",$val);
      
      if($content[0] != $editnum){
        // $fp=fopen($filename,'a');
        // fwrite($fp,$val);
        // fclose($fp);

      }else{
        $sample = explode("<>",$val);
      }
  }
}

?>
<input type="text"name="name"placeholder="名前"value=<?php if(!empty($sample) && $sample[0]==$editnum){echo $sample[1];}?>><br>
<input type="text"name="comment"placeholder="コメント"value=<?php if(!empty($sample) && $sample[0]==$editnum){echo $sample[2];}?>><br>
<input type="hidden"name="editcon"value=<?php if(!empty($sample) && $sample[0]==$editnum){echo $editnum[0];}?>>
<input type="submit"value="送信">
<br>
<br>
<input type="text"name="delete"placeholder="削除対象番号"><br>
<input type="submit"value="削除">
<br>
<br>
<input type="text"name="editnum"placeholder="編集対象番号"><br>
<input type="submit"value="編集"></form>

<?php

//削除ボタン
 if(isset($_POST["delete"])){
   $delete = $_POST["delete"];
   $fp = fopen($filename, 'r+');
   ftruncate($fp, 0);

   foreach($file as $val){
     $content = explode("<>", $val);
     if($content[0] != $delete){
      $fp = fopen($filename, 'a');
      fwrite($fp, $val);
      fclose($fp); 
     }
   }
 }

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