<?php
  $mail = $_POST["mail_address"];
  $pswd = $_POST["password"];
  //データベースに接続(test3)
  $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
  $db = new PDO($dsn, 'root', 'root');
  $s_res = $db->query("select s_user_id,passwd from sanka_user where mail_address='".$mail."'");
  $b_res = $db->query("select b_user_id,passwd from bosyu_user where mail_address='".$mail."'");
  $s_cnt = $s_res->rowCount();
  $b_cnt = $b_res->rowCount();
  if ($s_cnt or $b_cnt){
    if ($s_cnt){
      $head = "s";
      $res = $s_res;
    }else{
      $head = "b";
      $res = $b_res;
    }
    foreach( $res as $value ) {
      if("$value[1]" == $pswd){//$value[0]=?_user_id $value[1]=passwd
        echo '
        <form method="post" action="'.$head.'_home.php">
          <input type="hidden" name="'.$head.'_user_id" value="'.$value[0].'" />
        </form>
        <script>
          document.forms[0].submit();
        </script>';
      }
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
    <link rel="stylesheet" type="text/css" href="./CSS/size.css">
    <!--<link rel="stylesheet" type="text/css" href="./CSS/botan.css">-->
  </head>

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
            <form action="#" name="login" method="post">
              <input type="text" name="mail_address" placeholder="メールアドレス"><br>
              <input type="password" name="password" placeholder="パスワード"><br>
              <!--<a href= "javascript:login.submit()" class="btn-square3x">ログイン</a><br>-->
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
