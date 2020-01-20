<?php
  $b_user_id = $_POST['b_user_id'];
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>募集側ホーム</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/size.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <p href= "login.login">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
  </div>

  <div class="popup-overlay">
    <!--Creates the popup content-->
    <div class="popup-content">
      <p>ログアウトしますか？</p>
      <!--popup's close button-->
      <button-ok class="ok">はい</button-ok>
      <button-no class="no">いいえ</button-no>
    </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">
  /*検索ボタンが押されたとき*/
  $(".back").on("click", function(){
    $(".popup-overlay, .popup-content").addClass("active");
    });
  /*削除確認*/
  $(".ok").on("click", function(){
    $(".popup-overlay, .popup-content").removeClass("active");
    location.href="login.php";
  });
  $(".no").on("click", function(){
    $(".popup-overlay, .popup-content").removeClass("active");
  });
  </script>




  <div id="body-bkx">
    <center> <!-- 中央寄せ -->
    <div class="inline-block_test1">
      <center> <!-- 中央寄せ -->
      <form method="post" name="vol" action="b_vol_regd.php" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $s_user_id; ?>" />
        <a href="javascript:vol.submit()" class="hexagonB"><span>登録編集</span></a><br>
      </form>
      <form method="post" name="option" action="b_option.html" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $s_user_id; ?>" />
        <a href="javascript:option.submit()" class="radius_test"><span>オプション</span></a><br>
      </form>
      <form method="post" name="settiement" action="b_settiement.php" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $s_user_id; ?>" />
        <a href="javascript:settiement.submit()" class="hexagonB"><span>決済</span></a><br>
      </form>
    </center> <!-- 中央寄せ -->
    </div>
      <div class="inline-block_test">
        <center> <!-- 中央寄せ -->
      <form method="post" name="entrant" action="b_entrant_join.php" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $s_user_id; ?>" />
        <a href="javascript:entrant.submit()" class="radius_test"><span>参加者確認</span></a><br>
      </form>
      <form method="post" name="qr_choice" action="b_qr_choice.php" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $s_user_id; ?>" />
        <a href="javascript:qr_choice.submit()" class="hexagonB"><span>QRコード</span></a><br>
      </form>
      <form method="post" name="setting" action="b_setting_edit.php" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $s_user_id; ?>" />
        <a href="javascript:setting.submit()" class="radius_test"><span>設定</span></a><br>
      </form>
      </center> <!-- 中央寄せ -->
  </div>
  <center> <!-- 中央寄せ -->
  </div>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
