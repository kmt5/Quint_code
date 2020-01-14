<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_appcheck.css">
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
          <i class="far fa-list-alt"></i>フレンド申請確認
        </div>
      </div>
<?php
 $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
 $db = new PDO($dsn, 'root', 'root');
 $frid3 = "SELECT * FROM sanka_users WHERE s_user_id in (SELECT fr_user_id FROM friends where my_user_id ='1234567a' and reqest_flag = 1)";
 $result = $db->query($frid3);
 foreach ($result as $row) {
  $img = file_get_contents($row['prof_path']);
  $enc_img = base64_encode($img);
  $imginfo = getimagesize('data:application/octet-stream;base64,' . $enc_img);
      echo '<div class="frd-appcheck">';
      echo '<h1>';
      echo '<a href="s_frd_list_pro.php?id='.$row['s_user_id'].'">';
      echo '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'" class="img">';
      echo $row['nickname'];
      echo '</a>';
      echo '<div class="btn">';
      echo '<button-ok class="ok">承認</button-ok>';
      echo '<button-no class="no">拒否</button-no>';
      echo '</div>';
      echo '<br>';
      echo '</div>';
 }
 ?>
    </div>
  </div>

  <div class="popup-overlay">
    <!--Creates the popup content-->
    <div class="popup-content">
      <p>user_nameさんと<br>
        フレンドになりました！<br>
      </p>
      <!--popup's close button-->
      <button-ok1 class="ok1">OK</button-ok1>
    </div>
  </div>

  <div class="popup1-overlay">
    <div class="popup-content1">
      <p>user_nameさんからの<br>
        フレンド申請を拒否しました！
      </p>
      <!--popup's close button-->
      <button-ok1 class="ok1">OK</button-ok1>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">
    /*承認ボタン押した際の処理*/
    $(".ok").on("click", function(){
      $(".popup-overlay, .popup-content").addClass("active");
    });
  /*拒否ボタン押した際の処理*/
  $(".no").on("click", function(){
    $(".popup1-overlay, .popup-content1").addClass("active");
  });
  /*確認Okボタン押した際の処理*/
  $(".ok1").on("click", function(){
    $(".popup-overlay, .popup-content").removeClass("active");
    $(".popup1-overlay, .popup-content1").removeClass("active");
  });


  </script>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
