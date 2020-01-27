<?php
session_start();
$b_user_id = $_POST["b_user_id"];
echo $b_user_id;
$_SESSION["b_user_id"] = $b_user_id;
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
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
      <form method="post" name="formback" action="b_settlement.php">
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
      <!-- ページ上部のタイトル部分 -->
      <div id="Toptitle1">
        <i class="fas fa-coins"></i>決済情報確認
      </div>
      <div class="setumei">
        下記の口座にお振込み下さい。
      </div>
      <div class="zyokyo1">
        &nbsp;　銀行名：○○銀行<br>
        &nbsp;　支店名：○○支店<br>
        &nbsp;預金種別：当座預金<br>
        &nbsp;口座番号：123456789<br>
        &nbsp;口座名義：株式会社Quint<br>
        &nbsp;カナ表記：クイント
      </div>
      <div class="b">
        月額500円（税別）
        <br>
        <br>
        振込手数料は<br>
        お客様負担となります。<br>
        お振込みの際にお確かめ下さい。
      </div>
    </div>
</body>
</html>
