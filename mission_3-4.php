<?php
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$passward ='x9WPu27k';
$pdo = new PDO($dsn,$user,$passward);

$sql ='SHOW CREATE TABLE tbtest';
$result =$pdo->query($sql);
foreach($result as $row){
	print_r($row);
}
echo "<hr>";
?>