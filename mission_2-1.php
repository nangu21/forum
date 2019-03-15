<!DOCTYPE_html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
  <form action ="mission_2-1.php" method ="post">
   名前：
   <input type ="text" name ="name"><br />   
   コメント：
   <input type ="text" name ="comment"><br />
   <input type ="submit" value ="送信"> 
  </form>

   <?php
    $filename ='mission_2-1_Nangu.txt';
    
    $name =$_POST['name'];
    $comment =$_POST['comment']; 
    $date =date("Y/m/d G:i:s");
    $num =count(file($filename))+1;
    
    $contents =$num."<>".$name."<>".$comment."<>".$date;
    
    //条件分岐
    if(!empty($name) && !empty($comment)){
    
    //書き込み
    $fp =fopen($filename,'a');
    fwrite($fp, $contents.PHP_EOL);
    fclose($fp);
     
     //読み込み
     file_get_contents($filename);
     
     //array($display);
     
     //書き出し 
     //foreach($display as $displaycomment){
        //echo $number.'<>'.$displaycomment,"<br />";
     // }     
     
     
      } 
   
   ?>
</body>
</html>

