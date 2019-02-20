<!DOCTYPE html>
<html>
<head>
<title>結果</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="./mission_6-1_stylesheet_main.css">
</head>
<header>
<div class="header">
<div class="header-logo">英単語チェッカー</div>
</div>
</header>
<body>
</body>
</html>


<?php
session_start();

ob_start();
require('./mission_6-1_mainpage_2.php');
ob_clean();

$result_disp="あなたのスコアは".$_SESSION['cnt']."ポイントです。";

echo "<p> $result_disp </p>";

session_destroy();
?>

<html>
<div class="retry">
	<p3>もう一度やる？</p3>
 	<a href="./mission_6-1_mainpage.php" class="retry_btn" role="button">Retry</a>
 </div>
</html>