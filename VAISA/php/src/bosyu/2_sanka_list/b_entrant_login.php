<?php
session_start();

$b_user_id = $_POST["b_user_id"];
$_SESSION["b_user_id"] = $b_user_id;
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');

$getPass = $db->query("SELECT passwd FROM bosyu_users WHERE b_user_id = $b_user_id");
foreach ($getPass as $get_pass) {
  $passwd =  $get_pass['passwd'];
}
// 変数の初期化
$res = null;
$enc = array();
$message = '';

// 暗号化
$password_base = $_POST['password'];
$enc = array(
  'cost' => 12
);
$hash = password_hash($password_base, PASSWORD_DEFAULT, $enc);

// パスワードチェック
if (isset($_POST["password"])) {
  if (!password_verify($passwd, $hash)) {
    $message = 'パスワードが間違っています。';
  } else {
    header("Location: b_entrant_vol_list.php");
    exit;
  }
}
$db = null;
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加者一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link rel="stylesheet" type="text/css" href="entrant.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:formback.submit()">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </form>
    <form method="post" name="formhome" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:formhome.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        <i class="fas fa-handshake"></i>　参加者一覧
      </div>
      <h1 align="center">ログイン</h1>
      <h3>
        ここから先では個人情報が管理されています。<br>
        安全性のためパスワードを再入力してください。
      </h3>
      <div align="center" class="login">
        <br><br>
        <p align="left">パスワード</p><br>
        <form action="b_entrant_login.php" method="post">
          <input type='hidden' name='b_user_id' value="<?php echo $b_user_id; ?>">
          <input type="password" name="password" placeholder="Password" />
          <input type="submit" value="ログイン">
        </form>
        <br>
        <p style="color: red"><?php echo $message ?></p>
        <br>
      </div>
    </div>
  </div>
</body>

</html>