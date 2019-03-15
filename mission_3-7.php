<?php
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$passward ='x9WPu27k';
$pdo = new PDO($dsn,$user,$passward);

$id = 1;
$nm ="デリダ";
$kome ="脱構築";
$sql ="update tbtest set name='$nm' , comment='$kome' where id=$id";
$result =$pdo->query($sql);
?>