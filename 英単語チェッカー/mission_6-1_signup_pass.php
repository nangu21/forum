<?php
//データベースに接続
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$password ='x9WPu27k';
$pdo = new PDO($dsn,$user,$password);

?>

<!DOCTYPE html>
<html>
<head>
<title>本登録画面</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://tt-562.99sv-coco.com/mission_6-1_stylesheet.css">
</head>
<header>
<div class="header">
<div class="header-logo">英単語チェッカー</div>
</div>
</header>
<body>
	<h1>本登録画面</h1>
	<div class="box_form">
	<form action="mission_6-1_signup_pass.php"method="post">
	<p>登録メールアドレス：<input type="text" name="user_email" placeholder="メールアドレス" size="30"></p>
	<p>登録ユーザー名：<input type="text" name="user_name" placeholder="ユーザー名" size="20"></p>
	<p>パスワード：<input type="text" name="user_pass" placeholder="パスワード" size="20"></p>
	<input type="submit" value="登録する">
	</div>
	</form>
</body>
</html>

<?php

if(!empty($_POST['user_email']) && !empty($_POST['user_name']) && !empty($_POST['user_pass'])){
$sql='SELECT*FROM tb_mission6';
$results=$pdo->query($sql);
	foreach($results as $row){
		
		if($_POST['user_email'] == $row['email'] && $_POST['user_name'] == $row['name']){
			//user_passをDBに保存
			$sql='ALTER TABLE tb_mission6 ADD user_pass varchar(32)';
			
			//user_emailとuser_nameを上書きして確定
			$id=$row['id'];
			$user_email=$row['email'];
			$user_name=$row['name'];
			$user_pass=$_POST['user_pass'];
			$sql="UPDATE tb_mission6 set email='$user_email' name='$user_name' user_pass='$user_pass' where id=$id";
			$result=$pdo->query($sql);
			
			
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://tt-562.99sv-coco.com/mission_6-1_confirm.php");
			exit();
			
			
		}
		
		}
		if($_POST['user_email'] != $row['email'] || $_POST['user_name'] != $row['name']){
			echo "ユーザー情報が正しく記入されていません。";
		}
}
?>