<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<?php
  $id = '00000001';
//データベースに接続(test3)
  $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
  $db = new PDO($dsn, 'root', 'root');
//接続確認    
  if ($db) {
      echo "データベースに繋がっています";
  } else {
      "データベースに繋がってないです";
  }
  $db->query("set names utf8");
  $getName = $db->query("SELECT groupname FROM bosyu_users WHERE b_user_id = $id");
  foreach ($getName as $group_name) {
    $groupname =  $group_name['groupname'];
  }
  $getDate = $db->query("SELECT kessai_flag from payments where b_user_id = $id");
  foreach($getDate as $pay_date) {
    $payment_date = $pay_date['kessai_flag'];
  }  
?>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>ボランティア登録</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="kessai.css">
</head>
<body>
  <div id="header-fixed">  <!-- ヘッダー箇所 -->
    <img border="0" src="../common/header.jpg" width="100%" height="100%">
    <img border="0" src="../common/back.jpg" width="20%" height="100%" class="back">
    <img border="0" src="../common/home.jpg" width="20%" height="100%" class="home">
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
        <a href="b_transfer.html">
        <button>振込先</button>
      </a>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
