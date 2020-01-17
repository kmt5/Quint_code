<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加者一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link rel="stylesheet" type="text/css" href="entrant.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <a href="javascript:history.back()">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
    <a href="b_home">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        <i class="fas fa-handshake"></i>　参加者一覧
      </div>
      <h1 align="center">ログイン</h1>
      <div align="center" class="login">
        <br><br>
        <p align="left">パスワード</p><br>
        <form action="" method="post">
          <input type="password" name="password" placeholder="Password"/>
          <input type="submit" value="ログイン">
        </form>
        <br>
        <br>
        <?php
        if ( isset ( $_POST['password'] ) ) {

          $result = $_POST['password'];

          if($result == 123) {
            // 何か表示させる
          header('Location: b_entrant_vol_list.php');
          } else {
            echo '<font color="red"><p>パスワードが違います</p></font>';
          }
        }
        ?>
        <br>
        <br>
      </div>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
