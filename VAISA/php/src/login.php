<?php
  $mail = $_POST["mail_address"];
  $pswd = $_POST["password"];
  //データベースに接続(vaisa)
  $loginFail  = false;

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
        $sql = "select kessai_flag from payments where b_user_id = '".$b_res['b_user_id']."'";
        $res2 = $db->query($sql)->fetch();
        if (!$res2['kessai_flag']) {
          echo '
          <form method="post" action="./bosyu/5_payment/b_paycheck.php">
            <input type="hidden" name="b_user_id" value="'.$res[0].'" />
          </form>
          <script>
            document.forms[0].submit();
          </script>';
        }
      }
      if("$res[1]" == $pswd){//$res[0] = ユーザID, $res[1] = パスワード
        echo '
        <form method="post" action="./'.$dir.'/'.$head.'_home.php">
          <input type="hidden" name="'.$head.'_user_id" value="'.$res[0].'" />
        </form>
        <script>
          document.forms[0].submit();
        </script>';
      }else{
        $loginFail = true;
      }
    }else{
      $loginFail = true;
    }
  }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
  <head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>PHP</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="./common/common.css">
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
              <input type="text" name="mail_address" value="<?php echo $mail; ?>" placeholder="メールアドレス"><br>
              <input type="password" name="password" placeholder="パスワード"><br>
              <input type="submit" value="ログイン" class="btn-square3x"><br><!--ログインボタン-->
            </form>
            <a href="manual.html" class="btn-square3y">アカウント登録</a><br><!--新規登録ボタン-->
          </center>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
  if ($loginFail) {
    echo '
    <script>
    alert("ログインに失敗しました")
    </script>';
  }
?>
