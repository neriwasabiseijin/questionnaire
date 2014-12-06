<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<meta name="viewport" content="width=device-width; text/html; charset=UTF-8", initial-scale=1.0, user-scalable=no>-->
    <title>アンケート</title>
</head>

<body id="myBody" style="overflow:hidden;">
   <!-- <h1>アンケート</h1>-->   
   <!--
   <input type="hidden" id="sex" name="sex" value='<?php echo $_POST["sex"] ?>' />
   <input type="hidden" id="age" name="age" value='<?php echo $_POST["age"] ?>' />
   -->
    <div id="mondai">
        <div style="font-size:large;">問題数<span id="questionNum">（1/20）<br>
        画像の初回読み込みに少々時間がかかります。このページのままお待ち下さい。
        </span></div>
        <div style="font-size:medium;">合成感（違和感）が</div>
    </div>
    <div id="myQuestion" style="visibility:hidden;">
        <div id="buttons">
            <button id="button_05">ない</button>
            <button id="button_04">微かにある</button>
            <button id="button_03">ある</button>
            <button id="button_02">明らかにある</button>
            <button id="button_01">非常にある</button>
        </div>
        
        <div id="imageBox" style="width:100%; height:100%;">
            <img src="./img/2.jpg">
        </div>
    </div>
   
<script src="js/fileNames.js"></script>
<script src="js/main.js"></script>
</body>
</html>
