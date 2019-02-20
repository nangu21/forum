<!DOCTYPE html>
<html>
<header>
<div class="header">
<div class="header-logo">英単語チェッカー</div>
</div>
</header>
</html>

<?php
session_start();
//解答を一時的に保管（スコアカウント用）
$filename ='mission_6-1_answers.txt';
    touch('mission_6-1_answers.txt');
   

$words=array('果物:f----' => 'fruit', '残念ながら:u-----------' => 'unfortunately', '一見したところ:a---------' => 'apparently', '成功:s------' => 'success', '便利な:c---------' => 'convenient', '費用:e------' => 'ecpense', '直ちに:i--------' => 'immediate', 'レシート:r------' => 'receipt', '間違いなく:a---------' => 'absolutely', '住宅:r---------' => 'residence', '獲得する:a------' => 'acquire', '報い:r-----' => 'reward', '公平な:f---' => 'fair', '助言(noun):a-----' => 'advice', '褒め言葉:c---------' => 'compliment', '攻撃する:a-----' => 'attack', '難しい:d--------' => 'difficult', '常に:a-----' => 'always', '明らかな:o------' => 'obvious', '能力:a------' => 'ability', '方法:m-----' => 'method', '本気で:s--------' => 'seriously', '選択肢:o-----' => 'option', '複雑な:c------' => 'complex', '共通の:c-----' => 'common', '普遍的な:u--------' => 'universal', '重要な:i--------' => 'important', '賞:p----' => 'prize', '例:e------' => 'example', '現象:p---------' => 'phenomenon');


	$random=array_rand($words,30);
	echo "<p>$random[0]</p>";
	
	$cnt=0;
	//$cnt=count(file($filename))+1;
?>

<!DOCTYPE html>
<html>
<head>
<title>メイン_問題ページ</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="http://tt-562.99sv-coco.com/mission_6-1_stylesheet_main.css">
</head>
<body>
<div class="answer_form">
	<form action="mission_6-1_mainpage_2.php" method="post">
	<input type="text" name="answer" placeholder="answer" size="25" class="answer">
	<input type="hidden" name="cnt" value=<?php echo $cnt-1; ?> >
	<input type="submit" value="Check!">
	</form>
</div>
</body>
</html>

<?php
foreach($words as $key => $v){
	
if(!empty($_POST['answer'])){	
	
	if($_POST['answer'] == $v){
		
		$value=$v;
	
			if($_POST['answer'] == $value){
	
			echo '<p>correct!</p>';
			
			//カウントのため、ファイルに正解フォームを保管
			$fp=fopen($filename, 'a+');
			fwrite($fp, $_POST['answer'].PHP_EOL);
			fclose($fp);
	
    			if(!empty($_POST['cnt'])){
				$cnt=count(file($filename));
				
				$_SESSION['cnt']=$cnt;
				}
				
			//echo "Score：".$cnt;
			}
  		}
	 }
} //不正解の時ゲーム終了
	if($_POST['answer'] != $value){
		
		//毎回ファイルを削除する
		unlink('mission_6-1_answers.txt');
		
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ./mission_6-1_finish.php");
		exit();
		
}

echo "<p>Score：$cnt</p>'";
	
?>