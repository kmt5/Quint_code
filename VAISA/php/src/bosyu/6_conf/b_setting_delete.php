<?php
  $b_user_id  = $_POST['b_user_id'];
  $really     = $_POST['really'];

  if ($really){
    $dsn  = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db   = new PDO($dsn, 'root', 'root');

    $sql = "SELECT prof_path FROM bosyu_users WHERE b_user_id = '".$b_user_id."'";
    $res = $db->query($sql)->fetch();
    if ($res['prof_path'] != "prof/default.jpg"){
      $file = "../../".$res['prof_path'];
      unlink($file);
    }

    //$sql  = 'DELETE FROM sanka_situations WHERE b_user_id = :b_user_id';
    //$stmt1  = $db->prepare($sql);
    //$params = array(':b_user_id' => $b_user_id);
    //$stmt1->execute($params);

    //$sql  = 'DELETE FROM volunteers WHERE b_user_id = :b_user_id';
    //$stmt2  = $db->prepare($sql);
    //$stmt2->execute($params);

    $sql  = 'DELETE FROM options WHERE b_user_id = :b_user_id';
    $stmt3  = $db->prepare($sql);
    $params = array(':b_user_id' => $b_user_id);
    $stmt3->execute($params);

    $sql  = 'DELETE FROM payments WHERE b_user_id = :b_user_id';
    $stmt4  = $db->prepare($sql);
    $stmt4->execute($params);

    $sql  = 'SET FOREIGN_KEY_CHECKS=0; DELETE FROM bosyu_users WHERE b_user_id = :b_user_id;';
    $stmt5  = $db->prepare($sql);
    $stmt5->execute($params);

    if ($stmt5){
      header('Location: ../../login.php');
    }
  }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>アカウント削除</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./b_setting.css">
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  </head>
  <body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="../b_setting_edit.php">
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
</body>
</html>
