<?php
  $mail = $_POST["mail_address"];
  $pswd = $_POST["password"];
  //データベースに接続(vaisa)

  if ($mail && $pswd){
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    $s_res = $db->query("select s_user_id,passwd from sanka_users where mail_address='".$mail."'");
    $b_res = $db->query("select b_user_id,passwd from bosyu_users where mail_address='".$mail."'");

    if ($s_res != false){
      $s_res = $s_res->fetch();
    }
    if ($b_res != false){
      $b_res = $b_res->fetch();
    }

    if ($s_res or $b_res){
      if ($s_res){
        $dir  = "sanka";
        $head = "s";
        $res  = $s_res;
      }else{
        $dir  = "bosyu";
        $head = "b";
        $res  = $b_res;
      }
      if("$res[1]" == $pswd){//$res[0] = ユーザID, $res[1] = パスワード
        echo '
        <form method="post" action="./'.$dir.'/'.$head.'_home.php">
          <input type="hidden" name="'.$head.'_user_id" value="'.$res[0].'" />
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
    <link rel="stylesheet" type="text/css" href="./CSS/login.css">
  </head>

  <body>
    <div id="header-fixed">
      <img border="0" src="./common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
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
              <input type="submit" value="ログイン" class="btn-square3x"><br><!--ログインボタン-->
            </form>
            <a href="manual.html" class="btn-square3y">アカウント登録</a><br><!--新規登録ボタン-->
          </center>
        </div>
      </div>
    </div>
    <div id="footer-fixed">
      <img border="0" src="./common/kokoku.jpg" width="100%" height="100%">
    </div>
  </body>
</html>
