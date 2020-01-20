<?php
  $mail = $_POST["mail_address"];
  $pswd = $_POST["password"];
//データベースに接続(test3)
  $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
  $db = new PDO($dsn, 'root', 'root');
  $sql = "select passwd from sanka_user where mail_address='".$mail."'";
  $res = $db->query($sql);
  foreach( $res as $value ) {
    if("$value[passwd]" == $pswd){
      header('Location: s_home.html');
    }
	}
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/color.css">
  <link rel=“stylesheet” type="text/css" href=“./CSS/size.css”>
  <link rel=“stylesheet” type="text/css" href=“./CSS/botan.css”>
</head>

<body>
  <body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    
  </div>

  <div id="body-bk">
    <div id="body-bk">
      <div id="body-bkxa" class="size2 size5">
        <center> <!-- 中央寄せ -->
          <h1>VAISA</h1>
          <br>
          <form action="login.php" method="post">
            <input type="text" name="mail_address" placeholder="メールアドレス"><br>
            <input type="text" name="password" placeholder="パスワード"><br>
            <input type="submit" value="ログイン" class="btn-square3x"><br>
          </form>
          <a href="manual.html" class="btn-square3y">アカウント登録</a><br>
        </center>
      </div>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>