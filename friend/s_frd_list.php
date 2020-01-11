<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_list.css">
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
          <i class="far fa-list-alt"></i>フレンド一覧
        </div>
      </div>

      <div class="frd-list">
        <a href="s_frd_list_pro.html">
          <!--ここに画像挿入 -->
          <img src="sample.png" class="img">
          user_name
        </a>
        <button class="del">削除</button>
      </div>
    </div>
  </div>

  <div class="popup-overlay">
    <!--Creates the popup content-->
    <div class="popup-content">
      <p>user_nameさんを<br>
        フレンドから削除しても<br>
        本当によろしいですか?
      </p>
      <!--popup's close button-->
      <button-ok class="ok">OK</button-ok>
      <button-no class="no">NO</button-no>
    </div>
  </div>
  <div class="popup1-overlay">
    <!--Creates the popup content-->
    <div class="popup-content1">
      <p>user_nameさんを<br>
        フレンドから削除しました
      </p>
      <!--popup's close button-->
      <button-ok class="ok1">OK</button-ok>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">
  //appends an "active" class to .popup and .popup-content when the "Open" button is clicked
  $(".del").on("click", function(){
    $(".popup-overlay, .popup-content").addClass("active");
  });

  //removes the "active" class to .popup and .popup-content when the "Close" button is clicked
  /*削除するかどうか*/
  $(".ok").on("click", function(){
    $(".popup-overlay, .popup-content").removeClass("active");
    $(".popup1-overlay, .popup-content1").addClass("active");
  });

  $(".no").on("click", function(){
    $(".popup-overlay, .popup-content").removeClass("active");
  });

  /*削除したことの確認*/
  $(".ok1").on("click", function(){
    $(".popup1-overlay, .popup-content1").removeClass("active");
  });

  </script>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
