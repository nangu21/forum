<?php
//データベースに接続
$dsn ='mysql:dbname=tt_562_99sv_coco_com;host=localhost';
$user ='tt-562.99sv-coco';
$password ='x9WPu27k';
$pdo = new PDO($dsn,$user,$password);

//データベース内にテーブルを作成
$sql ="CREATE TABLE tb_mission6" 
."("
."id INT AUTO_INCREMENT PRIMARY KEY," //オートカウント
."email varchar(100),"
."name char(32),"
.");";
$stmt =$pdo->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>会員登録画面</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://tt-562.99sv-coco.com/mission_6-1_stylesheet.css">
<header>
<div class="header">
    <div class="header-logo">英単語チェッカー</div>
</div>
</header>
<body>
<h1>会員登録画面</h1>
<div class="box_form">
	<form action="mission_6-1_signup.php"method="post">
	<p>メールアドレス：<input type="text" name="email" placeholder="メールアドレス" size="30"></p>
	<p>ユーザー名：<input type="text" name="name" placeholder="ユーザー名" size="20"></p>
	<input type="submit" value="登録する">
</div>
	</form>
</body>
</html>



<?php

//登録フォームが送信されたとき
if(!empty($_POST['email']) && !empty($_POST['name'])){
	
	//データの定義
    $sql=$pdo->prepare("INSERT INTO tb_mission6 (id,email,name) VALUES (:id,:email,:name)");
    $sql->bindParam('id',$id,PDO::PARAM_STR);
    $sql->bindParam(':email',$email,PDO::PARAM_STR);
    $sql->bindParam('name',$name,PDO::PARAM_STR);
   //データ受け取り
    $email=$_POST['email']; 
    $name=$_POST['name'];
    $sql->execute();
    
    //メールアドレス重複チェック
    $sql=$pdo->prepare('SELECT COUNT(*) AS cnt FROM tb_mission6 WHERE email=?');
    $sql->execute((array)$_POST['email']);
    $count=(int)$sql->fetchColumn();
    if($count > 1){
    echo "このメールアドレスは既に使われています。";
    }else{

    //本登録用メールの送信
    $to=$_POST['email'];
    $subject="会員登録用URLのお知らせ";
    $message="${_POST['name']}様
    登録はまだ完了していません。
    下記のURLから本登録を行ってください。
    http://tt-562.99sv-coco.com/mission_6-1_signup_pass.php";
    $headers='From: ';
    
   mail($to, $subject, $message, $headers);
    
    //フォーム送信後のブラウザの動作
    echo "メールを送信しました。記載URLから本登録を行ってください。";
    }
          
}elseif(empty($_POST['email']) && !empty($_POST['name'])){
	echo "メールアドレスが記入されていません。";
}elseif(!empty($_POST['email']) && empty($_POST['name'])){
	echo "ユーザー名が記入されていません。";
}
?>

