<?php
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$password ='x9WPu27k';
$pdo = new PDO($dsn,$user,$password);
?>

<!DOCTYPE html>
<html>
<head>
<title>ログイン画面</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://tt-562.99sv-coco.com/mission_6-1_stylesheet.css">
</head>
<header>
<div class="header">
<div class="header-logo">英単語チェッカー</div>
</div>
</header>
<body>
	<h1>ログイン画面</h1>
	<div class="box_form">
	<form action="mission_6-1_login_mod.php" method="post">
	<p>ユーザー名：<input type="text" name="name_check" placeholder="ユーザー名" size="20"></p>
	<p>パスワード：<input type="text" name="pass_check" placeholder="パスワード" size="20"></p>
	<input type="submit" value="ログインする">
	</div>
	</form>
</body>
</html>

<?php

if(!empty($_POST['name_check']) && !empty($_POST['pass_check'])){
	$sql='SELECT*FROM tb_mission6';
	$results=$pdo->query($sql);
    foreach($results as $row){
        	if($_POST['name_check'] == $row['name'] && $_POST['pass_check'] == $row['pass']){
    		//メインページへ
    		header("HTTP/1.1 301 Moved Permanently");
			header("Location: http://tt-562.99sv-coco.com/mission_6-1_mainpage.php");
			exit();
    		}
    	}
}elseif($_POST['name_check'] != $row['name'] && $_POST['pass_check'] != $row['pass']){
    		echo "ユーザー情報が正しく記入されていません。";
    	}elseif($_POST['name_check'] == $row['name'] && $_POST['pass_check'] != $row['pass']){
    		echo "ユーザー情報が正しく記入されていません。";
    	}elseif($_POST['name_check'] != $row['name'] && $_POST['pass_check'] == $row['pass']){
    		echo "ユーザー情報が正しく記入されていません。";
    	}
    	
?>