<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/color.css">
  <link rel=“stylesheet” type="text/css" href=“./CSS/size.css”>
  <link rel=“stylesheet” type="text/css" href=“./CSS/botan.css”>
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <a href= "regd_first.html">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
  </div>


  <div id="body-bk">
    <div id="body" class="bg_test">
      <center> <!-- 中央寄せ -->
        <h1> 参加側アカウント登録</h1>
      </center>
    </div>
    <div id="body" class="radio size1">
      <form form action="#" method="post">
        <dl>
      <center> <!-- 中央寄せ -->
      <h2>
        <dt>プロフィール画像</dt>
        <dd><input type="file" name="pic"></dd>
        <hr color="black"><br/>

        <dt>名前</dt>
        <dd><input type="text" name="fullname" id="input1" value=""></dd>
        <hr color="black"><br/>
        <dt>メールアドレス</dt>
        <dd><input type = “text” name =“mail_address“ id="input2" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>パスワード</dt>
        <dd><input type = “text” name =“password“ id="input3" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>住所</dt>
        <dd><input type = “text” name =“user_address“ id="input4" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>電話番号</dt>
        <dd><input type = “text” name =“tel_num“ id="input5" value=""></dd>
        <hr color="black"><br/><br/>

      <p>
        <dt>性別</dt>
        <input type="radio" name="gender" class="radio-input" id="radio-01">
        <label for="radio-01">男</label>
        <input type="radio" name="gender" class="radio-input" id="radio-02">
        <label for="radio-02">女</label><br>
      </p>
      <hr color="black"><br/>
        <dt>ひとこと</dt>
        <dd><input type = “text” name =“massage“ id="input6" value=""></dd>
        <hr color="black"><br/><br/>

      <p>
        <dt>住所エリア選択</dt>
        <dd><select name ="area"></dd>
        <option value="選択肢1" id="option">高知</option>
        <option value="選択肢2" id="option">愛媛</option>
        </select>
      </p>
      <hr color="black"><br/>
        <dt>ニックネーム</dt>
        <dd><input type = “text” name =“nickname“ id="input7" value=""></dd>
        <hr color="black"><br/>
      <br>
      <p class="btn-square1">登録完了</p><br>
    </center>
  </dl>
  </form>
  </div>
</div>

<div class="popup-overlay">
  <!--Creates the popup content-->
  <div class="popup-content">
    <p>登録に失敗しました</p>
    <!--popup's close button-->
    <button-ok class="ok">OK</button-ok>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
/*検索ボタンが押されたとき*/
$(".btn-square1").on("click", function(){
  var target1 = document.getElementById("input1").value;
  var target2 = document.getElementById("input2").value;
  var target3 = document.getElementById("input3").value;
  var target4 = document.getElementById("input4").value;
  var target5 = document.getElementById("input5").value;
  var target6 = document.getElementById("input6").value;
  var target7 = document.getElementById("input7").value;
  /*ID(文字数8)が入力されている場合*/
  if(target1.length >= 1 && target2.length >= 1 && target3.length >= 1 && target4.length >= 1 && target5.length >= 1 && target6.length >= 1 && target7.length >= 1){
    /*IDが存在するならの処理もここ？*/
    location.href="s_account_regd_comp.html";
  }else{
  /*IDが入力されてないor存在しない場合*/
  $(".popup-overlay, .popup-content").addClass("active");
  }
});
/*削除確認*/
$(".ok").on("click", function(){
  $(".popup-overlay, .popup-content").removeClass("active");
});
</script>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
