<?php
$s_user_id = $_POST['s_user_id'];
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>マイボランティア</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="header-fixed">
      <img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">

      <form method="post" name="back" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <button type="submit">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
      </button>
      </form>
      <form method="post" name="home" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <button type="submit">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
      </button>
      </form>
    </div>


    <div id="body-bk">
      <div id="body">

        <div id="Toptitle2">
          フレンド
        </div>

        <div class="list">
          <i class="far fa-list-alt fa-5x"></i>
          <a href="s_frd_list.php">フレンド一覧</a>
        </div>

        <div class="add">
          <i class="fa fa-user-plus fa-5x"></i>
          <a href="s_frd_add.php">フレンド追加</a>

        </div>

        <div class="appcheck">
          <i class="fas fa-users fa-5x"></i>
          <a href="s_frd_appcheck.php">フレンド申請確認</a>
        </div>
      </div>
    </div>

    <div id="footer-fixed">
      <img border="0" src="kokoku.jpg" width="100%" height="100%">
    </div>
  </body>
</html>
