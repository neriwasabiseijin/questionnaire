<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>画像の品質に関するアンケート</title>
</head>
<body>
<!--受け取ったデータは<br /><br />

<?php echo $_POST["question_num"]?>項目<br />
性別：<?php echo $_POST["sex"]?><br />
年齢層：<?php echo $_POST["age"]?><br />
所用時間：<?php echo $_POST["time"]?><br />

問題<br />
<?php 
    for($i = 0; $i<intval($_POST["question_num"]); $i++){
        $name = "answer_".$i;
        echo $_POST[$name][0] . "（".$_POST[$name][2] . "）：" . $_POST[$name][1] . "点 <br />";
    }

?>

です。-->
<br>
<br>
<h4>アンケートは終了いたしました。
<br>
ご協力ありがとうございました。</h4>

<?php

	$fp = fopen("testdata_".date("md").".csv", "a");
	//$fp = fopen("aa.csv", "a");
	
	 for($i = 0; $i<intval($_POST["question_num"]); $i++){
        $name = "answer_".$i;
        fwrite($fp, $_POST[$name][0] .",".
        	$_POST[$name][1] .",".
        	$_POST["time"] .",".
        	$_POST["question_num"] .",".
        	$_POST[$name][2] .",".
        	$_SERVER["REMOTE_ADDR"] .",".
        	"\n");
        }
	
	fclose($fp);

?>
 
  
 </body>

</html>