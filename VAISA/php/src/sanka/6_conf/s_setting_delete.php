<?php
  $s_user_id  = $_POST['s_user_id'];
  $really     = $_POST['really'];

  if ($really){
    $dsn  = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db   = new PDO($dsn, 'root', 'root');

    $sql = "SELECT prof_path FROM sanka_users WHERE s_user_id = '".$s_user_id."'";
    $res = $db->query($sql)->fetch();
    $file = "../../".$res['prof_path'];
    unlink($file);

    $sql  = 'DELETE FROM sanka_situations WHERE s_user_id = :s_user_id';
    $stmt1  = $db->prepare($sql);
    $params = array(':s_user_id' => $s_user_id);
    $stmt1->execute($params);

    $sql  = 'DELETE FROM friends WHERE my_user_id = :s_user_id';
    $stmt2  = $db->prepare($sql);
    $stmt2->execute($params);

    $sql  = 'DELETE FROM friends WHERE fr_user_id = :s_user_id';
    $stmt3  = $db->prepare($sql);
    $stmt3->execute($params);

    $sql  = 'DELETE FROM sanka_users WHERE s_user_id = :s_user_id';
    $stmt4  = $db->prepare($sql);
    $stmt4->execute($params);

    if ($stmt4->rowCount()){
      header('Location: ../../login.php');
    }
  }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>アカウント削除</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./s_setting.css">
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <form method="post" name="back" action="./s_setting_edit.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <a href="javascript:back.submit()">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </form>
    <form method="post" name="home" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <a href="javascript:home.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
  </div>

  <div id="body-bk">
    <div id="Toptitle2">
        <i class="fas fa-cogs"></i>アカウント設定
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
        <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
        <input type="hidden" name="really" value=1 />
        <a href="javascript:done.submit()" class="btn-square4">削除する</a><br>
      </form>
      <form method="post" name="No" action="./s_setting_edit.php">
        <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
        <a href="javascript:No.submit()" class="btn-square5">削除しない</a><br>
      </form>
    </center>
    </div>
    </div>
</body>
</html>
