<?php
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$passward ='x9WPu27k';
$pdo = new PDO($dsn,$user,$passward);

$sql ='SELECT * FROM tbtest';
$results =$pdo ->query($sql);
foreach($results as $row){
	echo $row['id'].',';
	echo $row['name'].',';
	echo $row['comment'].'<br>';
}
?>