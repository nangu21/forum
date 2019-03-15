<!DOCTYPE_html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
  <form action ="mission_2-3.php" method ="post">
   名前：
   <input type ="text" name ="name"><br />   
   コメント：
   <input type ="text" name ="comment">
   <input type ="submit" value ="送信"><br />
   <br />
   <input type ="text" name ="delete" value ="削除対象番号">
   <input type ="submit" value ="削除">
  </form>

   <?php
    $filename ='mission_2-3_Nangu.txt';
    touch('mission_2-3_Nangu.txt');
   
    $name =$_POST['name'];
    $comment =$_POST['comment']; 
    $date =date("Y/m/d G:i:s");
    $num =count(file($filename))+1;
    $contents =$num."<>".$name."<>".$comment."<>".$date;    
    

    if(!empty($name) && !empty($comment)){  //フォームが送信されたとき
    
    $fp =fopen($filename,'a');
    fwrite($fp, $contents.PHP_EOL);
    fclose($fp); 
    }
    
    $del =$_POST['delete'];
    
    if(!empty($del)){  //削除番号が送信されたとき
    
     $file =file($filename);
     
      $fp =fopen($filename,'w');
      ftruncate($fp, 0);
      fseek($fp, 0);
     
      
      foreach($file as $disp){
        $display =explode("<>", $disp);
                
        if($display[0] != $del){
            fwrite($fp, $disp);
            
        }
        
      }
      fclose($fp);
        
     }
     
     
     
     
      $file=file($filename);
    
      foreach($file as $disp){
      $display=explode("<>",$disp);
      echo $display[0]."";
      echo $display[1]."";
      echo $display[2]."";
      echo $display[3].""."<br />";
      }
        
   ?>
</body>
</html>