<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
  <head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>PHP</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="./CSS/common.css">
    <link rel="stylesheet" type="text/css" href="./CSS/color.css">
    <link rel=“stylesheet” type="text/css" href=“./CSS/size.css”>
  </head>
  <body>
    <div id="header-fixed">
      <img border="0" src="header.jpg" width="100%" height="100%">
    </div>
    <div id="body-bk">
      <div id="body">
        <center> <!-- 中央寄せ -->
          <h1> VAISAログイン</h1>
          <br>
          <h2>
            <form action ="login.php" method ="post">
              <input type="text" name="mail_address" placeholder="メールアドレス"><br>
              <input type="text" name="password" placeholder="パスワード"><br>
              <input type="submit" value="送信"><br>
              <!--
              <a href="s_home.html" class="btn-square">ログイン</a><br>
              <a href="manual.html" class="btn-square">アカウント登録</a><br>
              -->
            </form>
          </h2>
        </center>
      </div>
    </div>
    <div id="footer-fixed">
      <img border="0" src="kokoku.jpg" width="100%" height="100%">
    </div>
  </body>
</html>

<?php
  $mail_address = $_POST['mail_address'];
  $password = $_POST['password'];
  echo $mail_address;
  echo "<br/>";
  echo $password;
?>