<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>画像の品質に関するアンケート</title>
</head>
<body>
<h4>例：</h4>
<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; border-radius: 10px;"  Align="center">
<font size="-1" face="ＭＳ Ｐゴシック,Courier New">
この画像は合成感が<b>非常にある</b>  と考えられます。<br>
一番右、『非常にある』のボタンを押してください。<br>
</font>
</div>
        <div style="font-size:medium;">合成感（違和感）が</div><br>
<Div Align="center">
            <button type="button" onclick="alert('合成感が『非常にある』ため一番右のボタンを押してください')"><big>ない</big></button>
            <button type="button" onclick="alert('合成感が『非常にある』ため一番右のボタンを押してください')"><big>微かにある</big></button>
            <button type="button" onclick="alert('合成感が『非常にある』ため一番右のボタンを押してください')"><big>ある</big></button>
            <button type="button" onclick="alert('合成感が『非常にある』ため一番右のボタンを押してください')"><big>明らかにある</big></button>
            <button type="button" onclick="alert('ありがとうございます。例題は以上となります。\nページ下、『アンケートを開始する』を押してください。')"><big>非常にある</big></button>
            <br>
            <img src="./img/5-23313.jpg" alt="サンプル" width="300"><br>
            <br>
		 </Div>
        <Div Align="center">
        <input type="button" onclick="location.href='questionnaire.php' "value="アンケートを開始する">
        </Div>
        
        <?php echo $_POST["sex"]?>項目<br />
        <?php echo $_POST["age"]?>項目<br />
        <?php echo $_POST["terminal"]?>項目<br />
        <?php echo $_POST["place"]?>項目<br />
        <?php echo $_POST["shop"]?>項目<br />
         <?php echo $_POST["fitting"]?>項目<br />
          <?php echo $_POST["app"]?>項目<br />
           <?php echo $_SERVER["HTTP_USER_AGENT"]?>項目<br />
           <?php echo $_SERVER["REMOTE_ADDR"]?>項目<br />
           
        
    <?php

	$fp = fopen("userdata_".date("md").".csv", "a");
        fwrite($fp,
        	$_SERVER["REMOTE_ADDR"] .",".
        	$_POST["sex"] .",".
        	$_POST["age"] .",".
        	$_POST["terminal"] .",".
        	$_POST["place"] .",".
        	$_POST["shop"] .",".
        	$_POST["fitting"] .",".
        	$_POST["app"] .",".
			$_SERVER["HTTP_USER_AGENT"] .",".
        	"\n");
	fclose($fp);

?>


 </body>
</html>