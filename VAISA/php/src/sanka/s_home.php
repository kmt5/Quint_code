<?php
  $s_user_id = $_POST['s_user_id'];

?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
  <head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>参加側</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="./CSS/s_home.css">
  </head>
  <body>
    <div id="header-fixed">
      <img border="0" src="../common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
      <p onclick="MoveCheck();">
        <img border="0" src="../common/back.jpg" width="20%" height="100%" class="back">
      </p>
    </div>

    <script type="text/javascript">
      function MoveCheck() {
        if( confirm("ログアウトしますか？") ) {
            window.location.href = "../login.php";
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
          <form method="post" name="search" action="./1_search/s_search_first.php" class="inline-block_test">
            <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
            <a href="javascript:search.submit()" class="hexagonB"><span>検索</span></a><br>
          </form>
          <form method="post" name="my" action="./2_myvol/s_my_first.php"class="inline-block_test1">
            <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
            <a href="javascript:my.submit()" class="radius_test"><span>マイボラ</span></a><br>
          </form>
          <form method="post" name="friend" action="./3_friend/s_frd_first.php" class="inline-block_test1">
            <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
            <a href="javascript:friend.submit()" class="radius_test"><span>フレンド</span></a><br>
          </form>
          <form method="post" name="qr" action="./4_qr/s_qr.php" class="inline-block_test">
            <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
            <a href="javascript:qr.submit()" class="hexagonB"><span>QRコード</span></a>
          </form>
          <form method="post" name="point" action="./5_point/s_point_first.php" class="inline-block_test">
            <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
            <a href="javascript:point.submit()" class="hexagonB"><span>ポイント</span></a>
          </form>
          <form method="post" name="setting" action="./6_conf/s_setting_edit.php" class="inline-block_test1">
            <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
            <a href="javascript:setting.submit()" class="radius_test"><span>設定</span></a><br>
          </form>
        </center> <!-- 中央寄せ -->
      </div>
    </div>
    <center> <!-- 中央寄せ -->
    </div>


    <div id="footer-fixed">
      <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
    </div>
  </body>
</html>
