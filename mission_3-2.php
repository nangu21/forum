<?php
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$passward ='x9WPu27k';
$pdo = new PDO($dsn,$user,$passward);

$sql ="CREATE TABLE tbtest"
."("
."id INT,"
."name char(32),"
."comment TEXT"
.");";
$stmt =$pdo->query($sql);
?>