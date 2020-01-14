<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_add.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="header-fixed">
    <img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <a href= "s_frd_first.html">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href= "s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
  </div>

  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        フレンド
        <div id="Toptitle-frd">
          <i class="fa fa-user-plus"></i>フレンド追加
        </div>
      </div>

      <div class="frd-add">
        <a href="s_frd_add_appnow.php">フレンド申請中ユーザ一覧</a>
        <p class="id">あなたのID：1234567a</p>
        <form action="s_frd_add_app.php" method="POST">
          <input type="text" name="name" id="input" class="text" placeholder="検索したいIDを入力してください">
          <p><input type="submit" value="検索" class="search"></p>
        </form>
      </div>
    </div>
  </div>

  <div class="popup-overlay">
    <!--Creates the popup content-->
    <div class="popup-content">
      <p>検索したIDに一致する<br>
        ユーザが見つかりませんでした<br>
      </p>
      <!--popup's close button-->
      <button-ok class="ok">OK</button-ok>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">

  /*検索ボタンが押されたとき*/
  $(".search").on("click", function(){
    var target = document.getElementById("input").value;
    /*ID(文字数8)が入力されている場合*/
    if(target.length == 8 ){
      /*IDが存在するならの処理もここ？*/
    }else{
    /*IDが入力されてないor存在しない場合*/
    $(".popup-overlay, .popup-content").addClass("active");
    return false;
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

  </div>
