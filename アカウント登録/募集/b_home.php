<?php
  $b_user_id = $_POST['b_user_id'];
  //  echo $b_user_id;
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
    <p onclick="MoveCheck();">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
  </div>

  <script type="text/javascript">
  function MoveCheck() {
    if( confirm("ログアウトしますか？") ) {
      window.location.href = "login.php";
    }
    else {
      alert("ログアウトを中止しました");
    }
  }
</script>



  <div id="body-bkx">
    <center> <!-- 中央寄せ -->
    <div class="inline-block_test">
      <center> <!-- 中央寄せ -->
      <form method="post" name="vol" action="b_vol_regd.php" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <a href="javascript:vol.submit()" class="hexagonB"><span>登録編集</span></a><br>
      </form>
      <form method="post" name="entrant" action="b_entrant_join.php" class="inline-block_test1">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <a href="javascript:entrant.submit()" class="radius_test"><span>参加者確認</span></a><br>
      </form>
      <form method="post" name="option" action="b_option.html" class="inline-block_test1">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <a href="javascript:option.submit()" class="radius_test"><span>オプション</span></a><br>
      </form><!-- 中央寄せ -->
      <form method="post" name="qr_choice" action="b_qr_choice.php" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <a href="javascript:qr_choice.submit()" class="hexagonB"><span>QRコード</span></a><br>
      </form>
      <form method="post" name="settiement" action="b_settiement.php" class="inline-block_test">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <a href="javascript:settiement.submit()" class="hexagonB"><span>決済</span></a><br>
      </form>
      <form method="post" name="setting" action="b_setting_edit.php" class="inline-block_test1">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
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
