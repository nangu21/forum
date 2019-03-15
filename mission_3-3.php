<?php
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$passward ='x9WPu27k';
$pdo = new PDO($dsn,$user,$passward);

$sql ='SHOW TABLES';
$result =$pdo->query($sql);
foreach($result as $row){
	echo $row[0];
	echo '<br>';
}
echo "<hr>";
?>