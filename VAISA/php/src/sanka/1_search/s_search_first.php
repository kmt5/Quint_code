<?php
$s_user_id = $_POST["s_user_id"];
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>検索</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/search_first.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="form1" action="../s_home.php">
    <a href="javascript:form1.submit()">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
  </form>
  <form method="post" name="form1" action="../s_home.php">
    <a href="javascript:form1.submit()">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </form>
  </div>

  <div id = "body-bk">
    <div id = "body">
      <div id ="Toptitle1">
        検索
      </div>
      <form method="post" name="form1" action="s_search_area_spe.php">
        <a href="javascript:form1.submit()" class="btn-point1">地域を選択して検索</a>
      </form>
      <form method="post" name="form1" action="s_search_area_edit.php">
        <a href="javascript:form1.submit()" class="btn-point2">登録地域周辺で検索</a>
      </form>
    </div>
  </div>

  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
