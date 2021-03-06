<?php
  $b_user_id  = $_POST['b_user_id'];
  $really     = $_POST['really'];

  if ($really){
    $dsn  = "mysql:host=test3_mysql_1;dbname=sample;";
    $db   = new PDO($dsn, 'root', 'root');
    $sql  = 'DELETE FROM bosyu_user WHERE b_user_id = :b_user_id';
    $stmt  = $db->prepare($sql);
    $params = array(':b_user_id' => $b_user_id);
    $stmt->execute($params);

    if ($stmt->rowCount()){
      header('Location: login.php');
    }
  }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>アカウント削除</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/color.css">
  <link rel="stylesheet" type="text/css" href="./CSS/size.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <form method="post" name="back" action="b_setting_edit.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:back.submit()">
        <img border="0" src="back.jpg" width="20%" height="100%" class="back">
      </a>
    </form>
    <form method="post" name="home" action="b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:home.submit()">
        <img border="0" src="home.jpg" width="20%" height="100%" class="home">
      </a>
    </form>
  </div>

  <div id="body-bk">
    <div id="body" class="bg_test2">
      <center> <!-- 中央寄せ -->
        <h1> 募集側アカウント設定</h1>
      </center>
      </div>
    <div id="body" class="size3">
      <center> <!-- 中央寄せ -->
      アカウントの削除を行います<br>
      削除したアカウントはもう一度<br>
      ログインすることができず<br>
      データは削除されます<br>
</div>
<div id="body" class="size2">
  <center> <!-- 中央寄せ -->
      <form method="post" name="done" action="#" >
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <input type="hidden" name="really" value=1 />
        <a href="javascript:done.submit()" class="btn-square4">削除する</a><br>
      </form>
      <form method="post" name="No" action="b_setting_edit.php">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <a href="javascript:No.submit()" class="btn-square5">削除しない</a><br>
      </form>
    </center>
    </div>
    </div>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
