<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド追加</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_add_app.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <a href= "s_frd_add.html">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href= "s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
  </div>

  <div id="body-bk">
    <div id="body">
      <div class="frd-add-app">
        <!--ここに画像挿入 -->
        <img src="sample.png" class="i">
        <p class="user_name">user_name</p>
      </div>
      <button class="apply">申請</button>
    </div>
  </div>

  <div class="popup-overlay">
    <!--Creates the popup content-->
    <div class="popup-content">
      <p>s_user_nameさんへ<br>
        フレンド申請しました！
      </p>
      <!--popup's close button-->
      <button-ok class="ok">OK</button-ok>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">
    $(".apply").on("click", function(){
      $(".popup-overlay, .popup-content").addClass("active");
    });

    $(".ok").on("click", function(){
      $(".popup-overlay, .popup-content").removeClass("active");
      location.href="s_frd_add.php";
    });
  </script>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
