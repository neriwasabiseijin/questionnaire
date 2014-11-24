window.onload = function(){
    
    //window_load();
    var objectNum = 0; // 読み込む画像の数
    var objectLoadedCount = 0; // 読み込まれた画像の数
    
    // 画像の読み込み
    // imgFilenameは別ファイルにて定義
    var myImgs = new Array();
    for(var i=0; i<imgFilename.length; i++){
        myImgs[i] = ImageLoad(imgFilename[i]);
    }
    
    // 変数定義
    var questionNumText; // 問題数の表示
    var randImgNums = new Array();
    var showImageNum = 0;
    var pushedButtonValues = new Array();
    
    var sex,age;
    var nowImgWH = new Array();
    var parWH; // 画像の縦横比
    //var HTML_WIDTH = "640";
    
    window.onresize = window_load;
    
    // 初期化．画像の読み込みが完了したら開始
    function Init(){
        document.getElementById("myBody").style.height = window.innerHeight+"px";
       
        document.getElementById("myQuestion").style.visibility = "visible";
         document.getElementById("imageBox").style.height = window.innerHeight - (document.getElementById("mondai").clientHeight + document.getElementById("buttons").clientHeight);
    
    	//sex = document.getElementById("sex").value;
    	//age = document.getElementById("age").value;
        showImageNum = 0;
       
        //console.log(sex);
    
        for(var i=0; i<myImgs.length; i++){
            randImgNums[i] = i;
        }
        ArrayShuffle(randImgNums);
        
        var button_01 = document.getElementById("button_01");
        var button_02 = document.getElementById("button_02");
        var button_03 = document.getElementById("button_03");
        var button_04 = document.getElementById("button_04");
        var button_05 = document.getElementById("button_05");
        button_01.addEventListener("click", function(e){ClickEvaluationButton(e,1)});
        button_02.addEventListener("click", function(e){ClickEvaluationButton(e,2)});
        button_03.addEventListener("click", function(e){ClickEvaluationButton(e,3)});
        button_04.addEventListener("click", function(e){ClickEvaluationButton(e,4)});
        button_05.addEventListener("click", function(e){ClickEvaluationButton(e,5)});      

        console.log(randImgNums);
        ShowImage();
    }

    function ShowImage(){
        var imageBox = document.getElementById("imageBox");
        imageBox.innerHTML = "";
        
        var show_img  = myImgs[randImgNums[showImageNum]];
        imageBox.appendChild(show_img);
        show_img.id ="myImg";
        parWH = show_img.width/show_img.height;
        document.getElementById("questionNum").innerHTML = "（"+(showImageNum+1)+"/"+QUESTION_NUM+"）";

        imgSizeChange();

        
        
        //imageBox.width = sW;
        //imageBox.height = sH;
        
    }
    
    // 画面サイズ変更時
    function window_load() {
        document.getElementById("myBody").style.height = window.innerHeight+"px";
        var imgBox = document.getElementById("imageBox");
        imgBox.style.width = "100%";
        imgBox.style.height = window.innerHeight - (document.getElementById("mondai").clientHeight + document.getElementById("buttons").clientHeight);
//        imgBox.style.height = "50px";
		imgSizeChange();
	}
    
    function imgSizeChange(){
        //sW = window.innerWidth;
		//sH = window.innerHeight;
		var img = document.getElementById("myImg");
        var imgBox = document.getElementById("imageBox");
        
        if(imgBox.clientWidth < imgBox.clientHeight){
            img.style.width="100%";
            img.style.height="";
            img.style.height = 1/parWH*img.clientWidth + "px";
        }else{
            img.style.width="";
            img.style.height="100%";
            img.style.width = parWH*img.clientHeight +"px";
        }
    }
    
    function ClickEvaluationButton(e, eval){
        var buttonValue = [imgFilename[randImgNums[showImageNum]], eval];
        pushedButtonValues.push(buttonValue);
        var img = document.getElementById("myImg");
        nowImgWH.push([img.clientWidth, img.clientHeight])
        //console.log(pushedButtonValues);
        
        showImageNum++;
        if(showImageNum < QUESTION_NUM && showImageNum < myImgs.length){
            ShowImage();
        }else{
            var buttons = document.getElementById("buttons");
            buttons.innerHTML = "";
            //console.log(nowImgWH)
            Finish();
        }
    }
    
    // アンケート終了後の処理
    function Finish(){
        console.log("fin");
        
        var f = document.createElement("form");
        f.action = "data.php";
        f.method = "POST";
        document.getElementById("myQuestion").appendChild(f);
        
        
        var inp_qnum = document.createElement("input");
        inp_qnum.type = "hidden";
        inp_qnum.name = "question_num";
        inp_qnum.value = pushedButtonValues.length;
        f.appendChild(inp_qnum);
        
        /*
        var inp_sW = document.createElement("input");
        inp_sW.type = "hidden";
        inp_sW.name = "wide";
        inp_sW.value = sW;
        f.appendChild(inp_sW);   
        
       	var inp_sH = document.createElement("input");
        inp_sH.type = "hidden";
        inp_sH.name = "high";
        inp_sH.value = sH;
        f.appendChild(inp_sH);    
        */
        
        for(var i=0; i<pushedButtonValues.length; i++){
            var inp01 = document.createElement("input");
            inp01.type = "hidden";
            inp01.name = "answer_" + i + "[]";
            inp01.value = pushedButtonValues[i][0];
            f.appendChild(inp01);

            var inp02 = document.createElement("input");
            inp02.type = "hidden";
            inp02.name = "answer_" + i + "[]";
            inp02.value = pushedButtonValues[i][1];
            f.appendChild(inp02);
            
            var inp03 = document.createElement("input");
            inp03.type = "hidden";
            inp03.name = "answer_" + i + "[]";
            inp03.value = nowImgWH[i][0]+","+nowImgWH[i][1];
            f.appendChild(inp03);
        }
        
        var inp_sex = document.getElementById("sex");
        f.appendChild(inp_sex);
        
        var inp_age = document.getElementById("age");
        f.appendChild(inp_age);

        //document.getElementById("myQuestion").appendChild(f);
        f.submit();
    }
    
    // 画像の読み込み
    function ImageLoad(imageName){
        var img = new Image();
        img.src = "./img/" + imageName;
        objectNum++;
        img.addEventListener("load", objectLoaded, false);
        return img;
    }
    // 画像の読み込み終了判定
    function objectLoaded(){
        objectLoadedCount++;
        if(objectNum == objectLoadedCount){Init();}
    }
    
    // 配列のシャッフル
    function ArrayShuffle(arr){
        for(var i=0; i<arr.length; i++){
            var r = Math.floor(Math.random() * arr.length);
            var tmp = arr[i];
            arr[i] = arr[r];
            arr[r] = tmp;
        }
    }

}