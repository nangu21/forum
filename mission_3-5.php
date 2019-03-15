<?php
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$passward ='x9WPu27k';
$pdo = new PDO($dsn,$user,$passward);

$sql =$pdo -> prepare("INSERT INTO tbtest (id,name,comment) VALUES ('4',:name,:comment)");
$sql -> bindParam(':name',$name,PDO::PARAM_STR);
$sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
$name ='変更';
$comment ='マスカルポーネ';
$sql -> execute();
?>