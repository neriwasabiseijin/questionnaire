<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>アンケート</title>
</head>
<body>
受け取ったデータは<br /><br />
<?php echo $_POST["question_num"]?>項目<br />
性別：<?php echo $_POST["sex"]?><br />
年齢層：<?php echo $_POST["age"]?><br />

問題<br />
<?php 
    for($i = 0; $i<intval($_POST["question_num"]); $i++){
        $name = "answer_".$i;
        echo $_POST[$name][0] . "（".$_POST[$name][2] . "）：" . $_POST[$name][1] . "点 <br />";
    }


?>

です。

<?php

	$fp = fopen("sample.csv", "a");
	
	 for($i = 0; $i<intval($_POST["question_num"]); $i++){
        $name = "answer_".$i;
        fwrite($fp, $_POST[$name][0] .",".
        	$_POST[$name][1] .",".
        	$_POST[$name][2] .",".
        	$_POST["sex"] .",".
        	$_POST["age"] .",".
        	"\n");
        }
        
       // echo $_POST[$name][0] . "（".$_POST[$name][2] . "）：" . $_POST[$name][1] . "点 <br />";
	
	fclose($fp);

?>
 
  
 </body>

</html>