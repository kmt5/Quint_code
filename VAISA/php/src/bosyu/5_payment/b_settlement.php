<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<?php
  $id = $_POST["b_user_id"];
//データベースに接続(test3)
  $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db = new PDO($dsn, 'root', 'root');
//接続確認
  $db->query("set names utf8");
  $getName = $db->query("SELECT groupname FROM bosyu_users WHERE b_user_id = $id");
  foreach ($getName as $group_name) {
    $groupname =  $group_name['groupname'];
  }
  $getDate = $db->query("SELECT kessai_flag from payments where b_user_id = $id");
  foreach($getDate as $pay_date) {
    $payment_date = $pay_date['kessai_flag'];
  }
  $db=null;
?>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>ボランティア登録</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="kessai.css">
</head>
<body>
  <div id="header-fixed">  <!-- ヘッダー箇所 -->
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
      <form method="post" name="formback" action="../b_home.php">
        <input type="hidden" name="b_user_id" value="<?php echo $id; ?>" />
      <a href="javascript:formback.submit()">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </form>
    <form method="post" name="formhome" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $id; ?>" />
      <a href="javascript:formhome.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
  </div>
  <div id="body-bk">
    <div id="body">
      <!-- ページ上部のタイトル部分 -->
      <div id="Toptitle1">
        <i class="fas fa-coins"></i>決済情報確認
      </div>
      <div class="setumei">
        個人・団体名：
        <?php
        echo $groupname;
        ?>
        様
      </div>
      <div class="zyokyo">
        <?php echo date("Y年m月d日", strtotime("$payment_date")); ?>
        <br>までご利用いただけます
      </div>
      <div class="b">
        月額500円（税別）
        <br>
        <br>
        <form method="post" action="b_transfer.php">
        <input type="hidden" name="b_user_id" value="<?php echo $id; ?>" />
        <button type="submit">振込先</button>
      </form>
    </div>
  </div>
</body>
</html>
